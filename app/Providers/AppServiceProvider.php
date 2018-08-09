<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Form;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*
        Este es el nombre de usuario regular, debe comenzar con un carácter alfanumérico, debe ser de al 
        menos 4 caracteres de longitud (puedes controlar la longitud eligiendo tu longitud mínima deseada, 
        substrayendo uno de ella y poniendo ese número dentro de las llaves del final), puede contener 
        números pero no comenzar con uno. También puede contener guiones bajos, puntos o guiones, pero no 
        al comienzo o al final o tener más de uno junto (ae__, ae_- y ae._ serían inválidos).
        */
        Validator::extend('usuario', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^[a-zA-Z]((\.|_|-)?[a-zA-Z0-9]+){3}$/i', $value);
        });

        Validator::extend('nombre', function($attribute, $value, $parameters, $validator) {
            return preg_match('/[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?(( |\-)[a-zA-ZÀ-ÖØ-öø-ÿ]+\.?)*/i', $value);
        });

        Validator::extend('telefono', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^\d{4}\-\d{3}\-\d{4}$/i', $value);
        });

        Validator::extend('password', function($attribute, $value, $parameters, $validator) {
            return preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $value);
        });

        Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes']);
        Form::component('bsNumber', 'components.form.number', ['name', 'value', 'attributes']);
        Form::component('bsPassword', 'components.form.password', ['name', 'value', 'attributes']);
        Form::component('bsTextarea', 'components.form.textarea', ['name', 'value', 'attributes']);

        Form::component('bsSelect', 'components.form.select', ['name', 'value', 'default', 'attributes']);
        Form::component('bsModalBusqueda', 'components.modalBusqueda', ['value', 'attributes']);
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
