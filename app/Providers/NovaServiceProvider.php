<?php

namespace App\Providers;

use App\Models\Benefit;
use App\Models\Course;
use App\Nova\Metrics\UsersPerDay;
use DigitalCreative\CollapsibleResourceManager\CollapsibleResourceManager;
use DigitalCreative\CollapsibleResourceManager\Resources\InternalLink;
use DigitalCreative\CollapsibleResourceManager\Resources\TopLevelResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Cards\Help;
use Laravel\Nova\Nova;
use Laravel\Nova\NovaApplicationServiceProvider;


class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
            ->withAuthenticationRoutes()
            ->withPasswordResetRoutes()
            ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        Gate::define('viewNova', function ($user) {
            return in_array($user->email, [
                'ilanvaldez34@gmail.com'
            ]);
        });
    }

    /**
     * Get the cards that should be displayed on the default Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {
        return [];
    }

    /**
     * Get the extra dashboards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function dashboards()
    {
        

        return [
            
        ];
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [
            new CollapsibleResourceManager([
                'navigation' => [
                    TopLevelResource::make([
                        'label' => 'Usuarios',
                        'expanded' => true,
                        'resources' => [
                            \App\Nova\User::class                            
                        ]                        
                    ]),
                    TopLevelResource::make([
                        'label' => 'Configuración',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Config::class                          
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'CMS',
                        'expanded' => false,
                        'resources' => [                             
                            InternalLink::make([
                                'label' => 'Valores',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/valors',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'Unidades de negocio',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/unidads',
                                'params' => [ 'resourceId' => 1 ]
                            ]),  
                            InternalLink::make([
                                'label' => 'Clientes',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/clientes',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'La empresa',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/empresas',
                                'params' => [ 'resourceId' => 1 ]
                            ])              
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'Banners',
                        'expanded' => false,
                        'resources' => [
                            \App\Nova\Banner::class,
                             InternalLink::make([
                                'label' => 'Banner Inferior',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/bannerinferiors',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'Banner group',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/bannergroups',
                                'params' => [ 'resourceId' => 1 ]
                            ]),
                            InternalLink::make([
                                'label' => 'Banner para productos',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/bannerproductos',
                                'params' => [ 'resourceId' => 1 ]
                            ])
                        ]                       
                    ]),
                    TopLevelResource::make([
                        'label' => 'Productos',
                        'expanded' => false,
                        'resources' => [
                            InternalLink::make([
                                'label' => 'Categorías',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/categorias',
                                'params' => [ 'resourceId' => 1 ]
                            ]),  
                            InternalLink::make([
                                'label' => 'Medidas',
                                'badge' => null,
                                'icon' => null,
                                'target' => '_self',
                                'path' => '/resources/medidas',
                                'params' => [ 'resourceId' => 1 ]
                            ]),                
                        ]                       
                    ]),
                    
                ]
            ])
        ];
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
