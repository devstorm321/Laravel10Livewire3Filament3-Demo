<?php

namespace App\Livewire;

use Faker\Provider\fr_FR\Address;
use Faker\Provider\Image;
use Livewire\Component;
use Faker\Factory as Faker;
class CareerSite extends Component
{
    public ?string $title = null;

    public $search;

    public ?array $jobs = [];

    public function mount($token)
    {
        $this->title = $token;
//        dd(\App\Models\CareerSite::whereToken($token)->exists());

        for($i = 0; $i < 10; $i++) {
            $company_name = Faker::create('fr_FR')->company;
            $this->jobs[] = [
                'company_name' => $company_name,
                'title' => Faker::create('fr_FR')->jobTitle,
                'company_logo' => "https://ui-avatars.com/api/?name={$company_name}&size=360&background=random&color=fff&rounded=true",
                'location' => Address::departmentName(),
                'description' => Faker::create('fr_FR')->text(200),

            ];
        }

    }

    public function updated($propertyName)
    {
        if ($propertyName == 'search') {
            $this->filterJobs();
        }
    }

    private function filterJobs()
    {
        $this->jobs = []; // Réinitialiser les jobs

        // Repeupler la liste des jobs selon le critère de recherche
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create('fr_FR');
            $company_name = $faker->company;

            // Vérifier si le terme de recherche correspond à l'un des champs
            if (str_contains(strtolower($company_name), strtolower($this->search)) ||
                str_contains(strtolower($faker->jobTitle), strtolower($this->search))) {

                $this->jobs[] = [
                    'company_name' => $company_name,
                    'title' => $faker->jobTitle,
                    'company_logo' => "https://ui-avatars.com/api/?name={$company_name}&size=360&background=random&color=fff&rounded=true",
                    'location' => Address::departmentName(),
                    'description' => $faker->text(200),
                ];
            }
        }
    }

    public function render()
    {
        return view('livewire.career-site')
            ->layout('components.layouts.career')
            ->title($this->title);
    }
}
