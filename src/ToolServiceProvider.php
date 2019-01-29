<?php

    namespace KarimQaderi\ZoroasterLogViewer;


    use Illuminate\Support\Facades\Route;
    use Illuminate\Support\ServiceProvider;
    use KarimQaderi\Zoroaster\Sidebar\FieldMenu\MenuItem;
    use KarimQaderi\Zoroaster\Zoroaster;


    class ToolServiceProvider extends ServiceProvider
    {
        /**
         * Bootstrap any application services.
         *
         * @return void
         */
        public function boot()
        {
            $this->loadViewsFrom(__DIR__ . '/../resources/views' , 'zoroaster-log-viewer');

            $this->app->booted(function(){
                $this->routes();
            });

            Zoroaster::SidebarMenus([
                MenuItem::make()->route('Zoroaster-log-viewer.getListLogs' , 'مشاهدی خطاها')->icon('file-2')
            ]);


        }

        /**
         * Register the tool's routes.
         *
         * @return void
         */
        protected function routes()
        {
            if($this->app->routesAreCached()){
                return;
            }

            Route::middleware(['web' , 'can:Zoroaster','can:Zoroaster-log-viewer'])
                ->prefix(config('Zoroaster.path').'/Zoroaster-log-viewer')
                ->as('Zoroaster-log-viewer.')
                ->group(__DIR__ . '/../routes/web.php');
        }

        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {
            //
        }
    }
