@extends('00_layouts.02_system.app')
@section('title', 'Registrar usuario')
@section('BodyClass', 'void')
@section('Content')
    @if( env('ADMIT_REGISTER') === true )
        <div class="uk-container">
            <div class="uk-flex-center" uk-grid>
                <form class="uk-grid-small uk-margin-top" uk-grid method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                    @csrf
                    <h1>Registrar un nuevo usuario</h1>

                    <div class="uk-width-1-1">
                        <input class="uk-input {{ $errors->has('name') ? 'uk-form-danger' : '' }}" type="text" placeholder="Nombre" name="name" value="{{ old('name') }}" required autofocus>
                        @if ($errors->has('name'))
                            <span class="uk-text-danger">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-1">
                        <input class="uk-input {{ $errors->has('email') ? 'uk-form-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="correo@dominio.com" required>
                        @if ($errors->has('email'))
                            <span class="uk-text-danger">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input {{ $errors->has('password') ? 'uk-form-danger' : '' }}" type="password" name="password" placeholder="**********" required>
                        @if ($errors->has('password'))
                            <span class="uk-text-danger">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input {{ $errors->has('password_confirmation') ? 'uk-form-danger' : '' }}" type="password" name="password_confirmation" placeholder="**********" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="uk-text-danger">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>
                    {{--
                    <div class="uk-width-1-2@s">
                        <input class="uk-input {{ $errors->has('address') ? 'uk-form-danger' : '' }}" type="text" name="address" placeholder="Calle, Número y Colonia" required>
                        @if ($errors->has('address'))
                            <span class="uk-text-danger">
                                {{ $errors->first('address') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-4@s">
                        <input class="uk-input {{ $errors->has('phone') ? 'uk-form-danger' : '' }}" type="number" name="zip" placeholder="Código Postal" required>
                        @if ($errors->has('zip'))
                            <span class="uk-text-danger">
                                {{ $errors->first('zip') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-4@s">
                        <input class="uk-input {{ $errors->has('phone') ? 'uk-form-danger' : '' }}" type="number" name="phone" placeholder="Teléfono" required>
                        @if ($errors->has('phone'))
                            <span class="uk-text-danger">
                                {{ $errors->first('phone') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-2@s">
                        <input class="uk-input {{ $errors->has('city') ? 'uk-form-danger' : '' }}" type="text" name="city" placeholder="Ciudad" required>
                        @if ($errors->has('city'))
                            <span class="uk-text-danger">
                                {{ $errors->first('city') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-2@s">
                        <div class="width-100" uk-form-custom="target: > * > span:first-child">
                            <select name="state" required>
                                <option value="">Estado</option>
                            </select>
                            <button class="uk-button uk-button-default width-100" type="button" tabindex="-1">
                                <span class="font-300"></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                        @if ($errors->has('state'))
                            <span class="uk-text-danger">
                                {{ $errors->first('state') }}
                            </span>
                        @endif
                    </div>
                    --}}
                    <div class="uk-width-1-3@s">
                        <div class="width-100" uk-form-custom="target: > * > span:first-child">
                            <select name="role" required>
                                <option value="">Tipo de usuario</option>
                                <option value="super">Superadministrador</option>
                                <option value="admin">Administrador</option>
                                <option value="user">Usuario</option>
                            </select>
                            <button class="uk-button uk-button-default width-100" type="button" tabindex="-1">
                                <span class="font-300"></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                        @if ($errors->has('role'))
                            <span class="uk-text-danger">
                                {{ $errors->first('role') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-3@s">
                        <div class="width-100" uk-form-custom="target: > * > span:first-child">
                            <select name="permissions" required>
                                <option value="">Permisos</option>
                                <option value="777">Todos los permisos</option>
                                <option value="666">Lectura y escritura</option>
                                <option value="444">Lectura</option>
                            </select>
                            <button class="uk-button uk-button-default width-100" type="button" tabindex="-1">
                                <span class="font-300"></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                        @if ($errors->has('permissions'))
                            <span class="uk-text-danger">
                                {{ $errors->first('permissions') }}
                            </span>
                        @endif
                    </div>
                    <div class="uk-width-1-3@s">
                        <div class="width-100" uk-form-custom="target: > * > span:first-child">
                            <select name="active" required>
                                <option value="">Estatus</option>
                                <option value="1" selected>Activo</option>
                                <option value="0">Desactivado</option>
                            </select>
                            <button class="uk-button uk-button-default width-100" type="button" tabindex="-1">
                                <span class="font-300"></span>
                                <span uk-icon="icon: chevron-down"></span>
                            </button>
                        </div>
                        @if ($errors->has('active'))
                            <span class="uk-text-danger">
                                {{ $errors->first('active') }}
                            </span>
                        @endif
                    </div>

                    <div class="uk-margin">
                        <div class="uk-text-center">
                            <button type="submit" class="uk-button uk-button-primary">
                                Registrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <pre>El registro de usuarios está desactivado</pre>
    @endif
@endsection