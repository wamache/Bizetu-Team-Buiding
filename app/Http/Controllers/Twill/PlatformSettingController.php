<?php

namespace App\Http\Controllers\Twill;

use A17\Twill\Http\Controllers\Admin\ModuleController as BaseModuleController;
use A17\Twill\Models\Contracts\TwillModelContract;
use A17\Twill\Services\Forms\Fields\Color;
use A17\Twill\Services\Forms\Fields\Files;
use A17\Twill\Services\Forms\Fields\Input;
use A17\Twill\Services\Forms\Fields\Medias;
use A17\Twill\Services\Forms\Fields\Wysiwyg;
use A17\Twill\Services\Forms\Form;

class PlatformSettingController extends BaseModuleController
{
    protected $moduleName = 'platformSettings';

    /**
     * Configure the Twill module.
     */
    protected function setUpController(): void
    {
        // Keep Twill defaults.
    }

    /**
     * Platform Settings form.
     */
    public function getForm(TwillModelContract $model): Form
    {
        $form = parent::getForm($model);

        /*
        |--------------------------------------------------------------------------
        | Position
        |--------------------------------------------------------------------------
        */
        $form->add(
            Input::make()
                ->name('position')
                ->label('Position')
        );

        /*
        |--------------------------------------------------------------------------
        | Tag Line
        |--------------------------------------------------------------------------
        */
        $wysiwygOptions = [
            ['header' => [2, 3, 4, 5, 6, false]],
            'bold',
            'italic',
            'underline',
            'strike',
            'blockquote',
            'code-block',
            'ordered',
            'bullet',
            'hr',
            'code',
            'link',
            'clean',
            'table',
            'align',
        ];

        $form->add(
            Wysiwyg::make()
                ->name('tag_line')
                ->toolbarOptions($wysiwygOptions)
                ->allowSource(true)
                ->maxLength(200)
                ->note('Platform tagline')
        );

        /*
        |--------------------------------------------------------------------------
        | Logo
        |--------------------------------------------------------------------------
        */
        $form->add(
            Medias::make()
                ->name('logo')
                ->label('Company Logo')
                ->note('Site Logo')
        );

        /*
        |--------------------------------------------------------------------------
        | Navigation Video
        |--------------------------------------------------------------------------
        */
        $form->add(
            Files::make()
                ->name('learn_navigate')
                ->label('Learn to Navigate this Site Video')
        );

        /*
        |--------------------------------------------------------------------------
        | Brand Colours
        |--------------------------------------------------------------------------
        */
        $form->add(
            Color::make()
                ->name('primary_color')
                ->label('Primary Color')
        );

        $form->add(
            Color::make()
                ->name('secondary_color')
                ->label('Secondary Color')
        );

        $form->add(
            Color::make()
                ->name('third_color')
                ->label('Third Color')
        );

        /*
        |--------------------------------------------------------------------------
        | Menu Colours
        |--------------------------------------------------------------------------
        */
        $form->add(
            Color::make()
                ->name('menu_color')
                ->label('Menu Color')
        );

        $form->add(
            Color::make()
                ->name('menu_color_active')
                ->label('Active Menu Color')
        );

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */
        $form->add(
            Color::make()
                ->name('footer_color')
                ->label('Footer Color')
        );

        /*
        |--------------------------------------------------------------------------
        | Course Action Colours
        |--------------------------------------------------------------------------
        */
        $form->add(
            Color::make()
                ->name('enroll_color')
                ->label('Enroll Color')
        );

        $form->add(
            Color::make()
                ->name('progress_color')
                ->label('Progress Color')
        );

        $form->add(
            Color::make()
                ->name('retake_color')
                ->label('Retake Color')
        );

        $form->add(
            Color::make()
                ->name('completed_color')
                ->label('Completed Color')
        );

        /*
        |--------------------------------------------------------------------------
        | Registration Background
        |--------------------------------------------------------------------------
        */
        $form->add(
            Medias::make()
                ->name('registration_background')
                ->label('Registration Background')
                ->note('Image displayed on the registration page')
        );

        /*
        |--------------------------------------------------------------------------
        | Login Background
        |--------------------------------------------------------------------------
        */
        $form->add(
            Medias::make()
                ->name('login_background')
                ->label('Login Background')
                ->note('Recommended: 500 x 700px')
        );

        /*
        |--------------------------------------------------------------------------
        | LMS Icons / SVGs
        |--------------------------------------------------------------------------
        */
        $form->add(
            Medias::make()
                ->name('mandatory_svg')
                ->label('Mandatory SVG')
                ->note('Mandatory course icon')
        );

        $form->add(
            Medias::make()
                ->name('hr_recommended_svg')
                ->label('HR Recommended SVG')
                ->note('HR recommended course icon')
        );

        $form->add(
            Medias::make()
                ->name('clock_svg')
                ->label('Clock SVG')
                ->note('Clock icon')
        );

        $form->add(
            Medias::make()
                ->name('calendar_svg')
                ->label('Calendar SVG')
                ->note('Calendar icon')
        );

        $form->add(
            Medias::make()
                ->name('tick_svg')
                ->label('Tick SVG')
                ->note('Tick icon')
        );

        $form->add(
            Medias::make()
                ->name('user_svg')
                ->label('User SVG')
                ->note('User icon')
        );

        $form->add(
            Medias::make()
                ->name('notification_bell_svg')
                ->label('Notification Bell SVG')
                ->note('Notification bell icon')
        );

        $form->add(
            Medias::make()
                ->name('rocket_svg')
                ->label('Rocket SVG')
                ->note('Rocket icon')
        );

        $form->add(
            Medias::make()
                ->name('not_finished_trophy_svg')
                ->label('Not Finished Trophy SVG')
                ->note('Not finished trophy icon')
        );

        $form->add(
            Medias::make()
                ->name('finished_trophy_svg')
                ->label('Finished Trophy SVG')
                ->note('Finished trophy icon')
        );

        $form->add(
            Medias::make()
                ->name('like_svg')
                ->label('Like SVG')
                ->note('Like icon')
        );

        $form->add(
            Medias::make()
                ->name('comment_svg')
                ->label('Comment SVG')
                ->note('Comment icon')
        );

        return $form;
    }
}
