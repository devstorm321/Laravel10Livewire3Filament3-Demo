<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Navigation\NavigationGroup;
use Filament\Navigation\NavigationBuilder;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Filament\Pages\Auth\EditProfile;
use App\Filament\Pages\Auth\Register;
use App\Filament\Pages\Auth\EmailVerification\EmailVerificationPrompt;
use App\Filament\Pages\Auth\Login;
use App\Filament\Resources\BrandResource;
use App\Filament\Resources\GroupResource;
use App\Filament\Resources\HrManagerResource;
use App\Filament\Resources\RoleResource;
use App\Filament\Resources\UserResource;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->registration(Register::class)
            ->passwordReset()
            ->emailVerification(EmailVerificationPrompt::class)
            ->profile(EditProfile::class)
            ->brandName('Smart Profil')
            ->brandLogo(asset('images/logo.svg'))
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->authGuard('web')
            ->navigation(function (NavigationBuilder $builder): NavigationBuilder {

                if (auth()->user()->hasRole('super-admin')) {
                    return $builder->groups([
                        NavigationGroup::make()
                            ->label(__('Recruitment'))
                            ->items([
                               
                            ]),
                        NavigationGroup::make()
                            ->label(__('Outfils'))
                            ->items([
                                ...HrManagerResource::getNavigationItems(),
                            ]),
                        NavigationGroup::make()
                            ->label(__('Administration'))
                            ->items([
                                ...UserResource::getNavigationItems(),
                                ...RoleResource::getNavigationItems(),
                                ...GroupResource::getNavigationItems(),
                                ...BrandResource::getNavigationItems(),
                            ]),
                    ]);
                } else {
                    return $builder->groups([
                        NavigationGroup::make()
                            ->label(__('Outfils'))
                            ->items([
                                ...HrManagerResource::getNavigationItems(),
                            ])
                    ]);
                }
            });
    }
}
