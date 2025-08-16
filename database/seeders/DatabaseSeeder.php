<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Country;
use App\Models\Author;
use App\Models\Sponsor;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {

        $this->call(\Database\Seeders\AdminSeeder::class);
        
        // Categories
        $categories = [
            ['name' => 'Politique', 'color' => '#3B82F6'],
            ['name' => 'Économie', 'color' => '#10B981'],
            ['name' => 'Santé', 'color' => '#EF4444'],
            ['name' => 'Culture', 'color' => '#8B5CF6'],
            ['name' => 'Sport', 'color' => '#F59E0B'],
            ['name' => 'Technologie', 'color' => '#06B6D4'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Countries (Sample African countries)
        $countries = [
            ['name' => 'Nigeria', 'code' => 'NG'],
            ['name' => 'Afrique du Sud', 'code' => 'ZA'],
            ['name' => 'Kenya', 'code' => 'KE'],
            ['name' => 'Égypte', 'code' => 'EG'],
            ['name' => 'Ghana', 'code' => 'GH'],
            ['name' => 'Maroc', 'code' => 'MA'],
            ['name' => 'Sénégal', 'code' => 'SN'],
            ['name' => 'Côte d\'Ivoire', 'code' => 'CI'],
            ['name' => 'Cameroun', 'code' => 'CM'],
            ['name' => 'Tunisie', 'code' => 'TN'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }

        // Authors
        $authors = [
            [
                'name' => 'Aminata Traoré',
                'email' => 'aminata@capturemedia.com',
                'bio' => 'Journaliste spécialisée en politique africaine avec plus de 15 ans d\'expérience.',
                'photo' => 'https://images.pexels.com/photos/3760263/pexels-photo-3760263.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1'
            ],
            [
                'name' => 'Kwame Asante',
                'email' => 'kwame@capturemedia.com',
                'bio' => 'Expert en économie africaine et correspondant pour plusieurs médias internationaux.',
                'photo' => 'https://images.pexels.com/photos/2381069/pexels-photo-2381069.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1'
            ],
            [
                'name' => 'Fatou Diop',
                'email' => 'fatou@capturemedia.com',
                'bio' => 'Journaliste santé et sociale, passionnée par les enjeux de développement en Afrique.',
                'photo' => 'https://images.pexels.com/photos/3760790/pexels-photo-3760790.jpeg?auto=compress&cs=tinysrgb&w=300&h=300&dpr=1'
            ]
        ];

        foreach ($authors as $authorData) {
            Author::create($authorData);
        }

        // Sponsors
        $sponsors = [
            [
                'name' => 'African Development Bank',
                'logo' => 'https://via.placeholder.com/200x80/FFDD44/000000?text=ADB',
                'website' => 'https://www.afdb.org',
                'is_active' => true,
                'display_order' => 1
            ],
            [
                'name' => 'Orange Africa',
                'logo' => 'https://via.placeholder.com/200x80/FF6600/FFFFFF?text=Orange',
                'website' => 'https://www.orange.com',
                'is_active' => true,
                'display_order' => 2
            ]
        ];

        foreach ($sponsors as $sponsor) {
            Sponsor::create($sponsor);
        }

        // Sample Posts
        $posts = [
            [
                'title' => 'L\'économie numérique en Afrique : un secteur en pleine expansion',
                'excerpt' => 'L\'Afrique connaît une révolution numérique sans précédent, transformant son paysage économique et créant de nouvelles opportunités pour les entrepreneurs locaux.',
                'content' => $this->getSampleContent(),
                'featured_image' => 'https://images.pexels.com/photos/3760067/pexels-photo-3760067.jpeg?auto=compress&cs=tinysrgb&w=800',
                'type' => 'article',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(1),
                'author_id' => 2,
                'category_id' => 2,
                'country_id' => 1,
                'tags' => ['économie', 'numérique', 'innovation', 'afrique']
            ],
            [
                'title' => 'Élections présidentielles au Nigeria : enjeux et perspectives',
                'excerpt' => 'Analyse des enjeux majeurs des prochaines élections présidentielles nigérianes et de leur impact sur la stabilité politique de la région.',
                'content' => $this->getSampleContent(),
                'featured_image' => 'https://images.pexels.com/photos/6077326/pexels-photo-6077326.jpeg?auto=compress&cs=tinysrgb&w=800',
                'type' => 'article',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'author_id' => 1,
                'category_id' => 1,
                'country_id' => 1,
                'tags' => ['politique', 'élections', 'nigeria', 'démocratie']
            ],
            [
                'title' => 'La lutte contre le paludisme en Afrique de l\'Ouest : progrès et défis',
                'excerpt' => 'Tour d\'horizon des avancées dans la lutte contre le paludisme en Afrique de l\'Ouest et des défis qui restent à relever.',
                'content' => $this->getSampleContent(),
                'featured_image' => 'https://images.pexels.com/photos/4167541/pexels-photo-4167541.jpeg?auto=compress&cs=tinysrgb&w=800',
                'type' => 'article',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(3),
                'author_id' => 3,
                'category_id' => 3,
                'country_id' => 5,
                'tags' => ['santé', 'paludisme', 'afrique de l\'ouest', 'prévention']
            ]
        ];

        foreach ($posts as $postData) {
            $post = Post::create($postData);

            // Attach sponsors to some posts
            if ($post->id <= 2) {
                $post->sponsors()->attach([1, 2]);
            }
        }

        // Additional non-featured posts
        $additionalPosts = [
            [
                'title' => 'Festival de musique africaine : célébration de la diversité culturelle',
                'excerpt' => 'Le plus grand festival de musique africaine réunit des artistes de tout le continent pour célébrer la richesse culturelle africaine.',
                'content' => $this->getSampleContent(),
                'featured_image' => 'https://images.pexels.com/photos/1763075/pexels-photo-1763075.jpeg?auto=compress&cs=tinysrgb&w=800',
                'type' => 'article',
                'is_published' => true,
                'published_at' => now()->subHours(12),
                'author_id' => 3,
                'category_id' => 4,
                'country_id' => 7,
                'tags' => ['culture', 'musique', 'festival', 'art']
            ],
            [
                'title' => 'Innovation technologique : l\'Afrique du Sud pionnier en IA',
                'excerpt' => 'L\'Afrique du Sud se positionne comme leader en intelligence artificielle sur le continent africain avec des investissements majeurs.',
                'content' => $this->getSampleContent(),
                'featured_image' => 'https://images.pexels.com/photos/3861969/pexels-photo-3861969.jpeg?auto=compress&cs=tinysrgb&w=800',
                'type' => 'video',
                'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
                'video_type' => 'youtube',
                'is_published' => true,
                'published_at' => now()->subHours(6),
                'author_id' => 2,
                'category_id' => 6,
                'country_id' => 2,
                'tags' => ['technologie', 'IA', 'innovation', 'afrique du sud']
            ]
        ];

        foreach ($additionalPosts as $postData) {
            Post::create($postData);
        }
    }

    private function getSampleContent()
    {
        return '<p>L\'Afrique connaît actuellement une transformation économique remarquable, portée par l\'innovation technologique et l\'entrepreneuriat local. Cette évolution s\'inscrit dans un contexte de croissance démographique soutenue et d\'urbanisation accélérée.</p>

<h2>Une croissance soutenue</h2>

<p>Les pays africains affichent des taux de croissance économique parmi les plus élevés au monde, avec une moyenne de 4,5% ces dernières années. Cette performance s\'appuie sur plusieurs secteurs clés :</p>

<ul>
<li>Les services numériques et les fintech</li>
<li>L\'agriculture moderne et durable</li>
<li>Les énergies renouvelables</li>
<li>Le secteur manufacturier</li>
</ul>

<blockquote>
<p>"L\'Afrique est en train de réécrire son histoire économique grâce à l\'innovation et à la détermination de sa jeunesse", déclare un expert économique.</p>
</blockquote>

<h3>Les défis à relever</h3>

<p>Malgré ces avancées prometteuses, le continent doit encore surmonter plusieurs obstacles majeurs pour réaliser pleinement son potentiel économique. Les infrastructures, l\'éducation et la gouvernance restent des domaines prioritaires d\'investissement.</p>

<p>Les initiatives régionales de coopération économique, comme la Zone de libre-échange continentale africaine (ZLECAf), ouvrent de nouvelles perspectives d\'intégration et de développement économique harmonieux.</p>';
    }
}
