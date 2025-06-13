<div>
    <div class="card mb-0">
        <!-- Account -->
        <div class="card-body">
            <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-5">
                <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                    <img src="https://ui-avatars.com/api/?name={{ $proveedor->razon_social }}&color=FFFFFF&background=3e36f5&length=2"
                        alt="user image" class="d-block h-auto ms-0 ms-sm-5 rounded-4 user-profile-img" />
                </div>
                <div class="flex-grow-1 mt-4 mt-sm-12">
                    <div
                        class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-6">
                        <div class="user-profile-info">
                            <h4 class="mb-2">{{ $proveedor->razon_social }}</h4>
                            <ul
                                class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4">
                                <li class="list-inline-item">
                                    <span class="fw-medium"> Nit:
                                        {{ $proveedor->nit }}</span>
                                </li>

                            </ul>

                        </div>


                        @if ($proveedor->estado == 'CREACION BASICA')
                            @if ($boton == 'cuenta')
                                <a href="{{ url('datos-basicos', ['datos-basicos' => 's54da645d']) }}"
                                    class="btn btn-primary">
                                    <i class="ri-user-follow-line ri-16px me-2"></i>Actualizar datos
                                </a>
                            @endif

                            @if ($boton == 'banco')
                                <a href="{{ url('cuentas-bancarias', ['cuentas-bancarias' => 'g4s89gs6']) }}"
                                    class="btn btn-primary">
                                    <i class="ri-user-follow-line ri-16px me-2"></i>Actualizar Cuentas Bancarias
                                </a>
                            @endif
                        @endif
                    </div>
                </div>


            </div>
        </div>

        @if ($contactosValidador == 0)
            <div class="">
                <div class="alert alert-warning  alert-dismissible" role="alert">
                    <h5 class="alert-heading mb-1 d-flex align-items-center">
                        <span class="alert-icon rounded-3"><i class="ri-alert-line ri-22px"></i></span>
                        <span>Faltan datos de contactos llenar <a
                                href="{{ url('datos-basicos', ['datos-basicos' => 's54da645d']) }}"> aquí </a> </span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            </div>
        @else
            @if ($proveedor->camara_comercio == null)
                <div class="">
                    <div class="alert alert-warning  alert-dismissible" role="alert">
                        <h5 class="alert-heading mb-1 d-flex align-items-center">
                            <span class="alert-icon rounded-3"><i class="ri-alert-line ri-22px"></i></span>
                            <span>Faltan Adjuntar Camara de Comercio llenar <a
                                    href="{{ url('datos-basicos', ['datos-basicos' => 's54da645d']) }}"> aquí </a>
                            </span>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
                </div>
            @endif
        @endif

        @if ($cuentasValidador == 0)
            <div class="">
                <div class="alert alert-warning  alert-dismissible" role="alert">
                    <h5 class="alert-heading mb-1 d-flex align-items-center">
                        <span class="alert-icon rounded-3"><i class="ri-alert-line ri-22px"></i></span>
                        <span>Faltan datos bancarios llenar <a
                                href="{{ url('cuentas-bancarias', ['cuentas-bancarias' => 'g4s89gs6']) }}"> aquí </a>
                        </span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            </div>
        @endif

        @if ($validadorDatos == 2)
            @if ($proveedor->camara_comercio == null)
            @else
                @if ($proveedor->estado == 'CREACION BASICA')
                    <div class="">
                        <div class="alert alert-warning  alert-dismissible" role="alert">
                            <h5 class="alert-heading mb-1 d-flex align-items-center">
                                <span class="alert-icon rounded-3"><i class="ri-alert-line ri-22px"></i></span>
                                <span>Si ya completaste la actualización de todos los datos, entra <a
                                        href="{{ url('cuentas-bancarias', ['cuentas-bancarias' => 'g4s89gs6']) }}"> aquí
                                    </a>
                                </span>. y haz clic en el botón "Actualizar todos los datos".

                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="close"></button>
                        </div>
                    </div>
                @endif
            @endif

        @endif

    </div>
