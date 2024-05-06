<?php

namespace App\Providers;

use App\Models\Classroom;
use App\Models\Classwork;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use \Spatie\Ignition\Solutions\OpenAi\OpenAiSolutionProvider;
use function Symfony\Component\String\s;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
                $aiSolutionProvider = new OpenAiSolutionProvider(config('services.openai.key'));
                \Spatie\Ignition\Ignition::make()
                    ->addSolutionProviders([
                        $aiSolutionProvider,
                        // other solution providers...
                    ])
                    ->register();*/

        Paginator::useBootstrapFive();

        Relation::enforceMorphMap([
            'classwork' => Classwork::class,
            'post' => Post::class,
            'user' => User::class,
            'classroom' => Classroom::class,
        ]);

        $settings = Cache::get('app-setting');
        if (!$settings) {

            $settings = Setting::query()->pluck('value', 'name');
            Cache::put('app-settings', $settings);

            foreach ($settings as $name => $value) {
                Config::set($name, $value);
            }
        }
    }
}
