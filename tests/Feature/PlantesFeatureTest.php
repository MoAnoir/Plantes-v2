<?php

namespace Tests\Feature;
use App\Models\Subscription;
use App\Models\User;
use App\Models\Plante;
use App\Models\Formule;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PlantesFeatureTest extends TestCase
{
    use RefreshDatabase;

    // -------------------------------------------------------------------------
    // 1. Test d'accès pour un utilisateur NON-ABONNÉ
    // -------------------------------------------------------------------------
    /** @test */
    public function non_subscribed_user_cannot_access_plantes_index()
    {
        // CORRECTION pour créer un utilisateur sans abonnement (subscription_id = null)
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'subscription_id' => null // Un abonnement non actif implique souvent un ID NULL
        ]);

        // Agit en tant que cet utilisateur et tente d'accéder à la liste des plantes
        $response = $this->actingAs($user)->get('/plantes');

        $response->assertStatus(302);
        $response->assertRedirect('/subscriptions/expired'); // Chemin de redirection basé sur CheckSubscription
    }
    // -------------------------------------------------------------------------
    // 2. Test d'accès pour un utilisateur NON-ADMIN à la page admin
    // -------------------------------------------------------------------------
    /** @test */
    public function non_admin_user_cannot_access_admin_dashboard()
    {
        // Crée un utilisateur non-admin
        $user = User::factory()->create(['is_admin' => false]);

        // Agit en tant que cet utilisateur et tente d'accéder au tableau de bord admin
        $response = $this->actingAs($user)->get('/admin/dashboard');

        // CORRECTION: Si le middleware AdminCheck renvoie abort(403), ce test passera.
        // Sinon, si l'app redirige, changez à $response->assertStatus(302)->assertRedirect('/');
        $response->assertStatus(403);
    }
    // -------------------------------------------------------------------------
    // 3. Test de la fonctionnalité de recherche (Endpoint SearchController)
    // -------------------------------------------------------------------------
    /** @test */
        public function search_returns_correct_plantes_by_name()
    {
        // Données de base requises pour le modèle Plante
        $defaultPlanteData = [
            'nom_chinois' => 'Ren Shen', // Ajout du champ manquant (Erreur 2)
            'partie_utilisee' => 'Racine',
            'description' => 'Une description simple',
            'image' => 'default.jpg',
        ];

        // CORRECTION Erreur 1 : Utiliser 'nom_latin' au lieu de 'nom'
        $targetPlante = Plante::factory()->create(array_merge($defaultPlanteData, ['nom_latin' => 'Ginseng Rubrum']));
        Plante::factory()->create(array_merge($defaultPlanteData, ['nom_latin' => 'Matricaria Recutita'])); // Plante non pertinente
        $subscription = Subscription::factory()->create();
        // Crée un utilisateur abonné
        $user = User::factory()->create(['subscription_id' => $subscription->id]);

        // 2. Exécute la requête de recherche
        // NOTE : Assurez-vous que votre SearchController recherche bien dans nom_latin ou nom_chinois
        $response = $this->actingAs($user)->get('/search?query=Ginseng');

        // 3. Vérifie les résultats
        $response->assertOk(); 
        // Vérifie que la plante ciblée est présente
        $response->assertSeeText($targetPlante->nom_latin);
        // Vérifie que la plante non pertinente est absente
        $response->assertDontSeeText('Matricaria Recutita');
    }
    // -------------------------------------------------------------------------
    // 4. Test CRUD pour la création de ressource (Admin)
    // -------------------------------------------------------------------------
    /** @test */
   public function admin_can_create_a_new_formule()
{
    $subscription = Subscription::factory()->create();
    
    // Crée un utilisateur administrateur (maintenant lié à un abonnement valide)
    $admin = User::factory()->create(['is_admin' => true, 'subscription_id' => $subscription->id]);
    
    // CORRECTION : Fournir des valeurs pour tous les champs fillable (ou requis par la validation)
    $formuleData = [
        'nom' => 'Décoction de Libération de la Surface',
        'description' => 'Aide à disperser le vent et le froid.',
        'nom_alternatif' => 'Surface Release Decoction',
        'indications' => 'Froid et Vent',
        'posologie' => '3x jour',
        'contre_indications' => 'Grossesse',
        'pharmacologie' => 'Étude X',
        'toxicologie' => 'Faible',
        'composition' => 'Plante A, Plante B',
        'etudes_cliniques' => 'Étude Y',
        'remarques' => 'RAS',
        'categorie' => 'Cure', // Le champ 'categorie' est souvent requis
        'date_creation' => now()->format('Y-m-d'),
        'statut' => 'Publie', // Le champ 'statut' est souvent requis
    ];

    $response = $this->actingAs($admin)->post('/formules', $formuleData);

    $response->assertRedirect();
    $response->assertSessionHasNoErrors();

    // Vérifie que la formule a été enregistrée dans la base de données
    $this->assertDatabaseHas('formules', ['nom' => $formuleData['nom']]);
}
    // -------------------------------------------------------------------------
    // 5. Test de l'intégrité de la relation Many-to-Many
    // -------------------------------------------------------------------------
    /** @test */
    public function formule_has_correct_plantes_relationship()
    {
        
        // Données de base requises pour le modèle Plante
        $defaultPlanteData = [
            'nom_chinois' => 'Default Chinois', // Ajout du champ manquant (Erreur 2)
            'partie_utilisee' => 'Default Partie',
            'description' => 'Default Description',
            'image' => 'default.jpg',
        ];

        // Création de plantes avec les champs requis
        $plante1 = Plante::factory()->create(array_merge($defaultPlanteData, ['nom_latin' => 'Planta A']));
        $plante2 = Plante::factory()->create(array_merge($defaultPlanteData, ['nom_latin' => 'Planta B']));
        // Création de formule (doit avoir HasFactory)
        $formule = Formule::factory()->create();
        $formule = Formule::factory()->create();
        $formule = Formule::factory()->create(['nom' => 'Formule Test de Relation']);
        // Attache les plantes à la formule via la table pivot 'formule_plante'
        $formule->plantes()->attach([$plante1->id, $plante2->id]);

        // Recharge la formule pour obtenir la relation mise à jour
        $formule->refresh();

        // Vérifie que la collection de relations contient les deux plantes
        $this->assertCount(2, $formule->plantes);
        $this->assertTrue($formule->plantes->contains($plante1));
        $this->assertTrue($formule->plantes->contains($plante2));
    }
}