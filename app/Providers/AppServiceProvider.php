<?php

namespace App\Providers;

use App\Models\Mapel;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

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
        // ambil data dari mapel controller agar bisa diakses di semua file
        $mapels = Mapel::all();
        view()->share('mapels', $mapels);
        Blade::directive('youtubeEmbed', function ($expression) {
            return "<?php echo 'https://www.youtube.com/embed/' . preg_replace('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^\"&?\/\s]{11})/i', '$1', $expression); ?>";
        });
    }
}
