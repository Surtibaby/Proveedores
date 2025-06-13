<x-app-layout>


    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            <!-- Menu -->
            <livewire:navigation-menu />
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">

                <!-- Navbar -->

                <livewire:navbar />

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->


                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Card Info -->
                                <livewire:CardInfo />

                                <!-- / Card Info -->
                                <div class="container-xxl flex-grow-1 container-p-y">
                                    <div class="row gx-6">
                                        <!-- Navigation -->
                                        <div class="col-12 col-lg-4">
                                            <div class="d-flex justify-content-between flex-column mb-4 mb-md-0">
                                                <h5 class="mb-4">Actualizacion de Datos</h5>
                                                <ul class="nav nav-align-left nav-pills flex-column">
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link active" href="javascript:void(0);">
                                                            <i class="ri-user-line me-2"></i>
                                                            <span class="align-middle">Datos Basicos</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link"
                                                            href="{{ url('cuentas-bancarias', ['cuentas-bancarias' => 'g4s89gs6']) }}">
                                                            <i class="ri-bank-card-line me-2"></i>
                                                            <span class="align-middle">Cuentas Bancarias</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /Navigation -->

                                        <!-- Options -->
                                        <div class="col-12 col-lg-8 pt-6 pt-lg-0">
                                            <div class="tab-content p-0">
                                                <form method="POST" action="{{ url('datos-basicos') }}"
                                                    enctype="multipart/form-data">
                                                    @csrf

                                                    <div class="card  mb-6">

                                                        <div class="card-body">

                                                            <div class="card-body pt-0">

                                                                <div class="row g-5">
                                                                    <h5 class="card-header ">INFORMACIÓN DE CONTACTO
                                                                        <br>
                                                                        <small> Ingresa la información de estos tres
                                                                            departamentos.</small>
                                                                    </h5>
                                                                    <hr>
                                                                    <h6 class="">Departamento de Venta</h6>
                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="nombreContactoVenta"
                                                                                name="nombreContactoVenta"
                                                                                @if ($contactoVenta->nombre_contacto == 'null') @else
                                                                            value="{{ $contactoVenta->nombre_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="nombreContacto">Nombre</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="number"
                                                                                id="celularContactoVenta"
                                                                                name="celularContactoVenta"
                                                                                @if ($contactoVenta->celular_contacto == 'null') @else
                                                                            value="{{ $contactoVenta->celular_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Celular">Celular</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="direccionContactoVenta"
                                                                                name="direccionContactoVenta"
                                                                                @if ($contactoVenta->direccion_contacto == 'null') @else
                                                                            value="{{ $contactoVenta->direccion_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Direccion">Dirección</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="email"
                                                                                id="emailContactoVenta"
                                                                                name="emailContactoVenta"
                                                                                @if ($contactoVenta->email_contacto == 'null') @else
                                                                            value="{{ $contactoVenta->email_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Email">Email</label>
                                                                        </div>
                                                                    </div>

                                                                    <hr>
                                                                    <h6 class="">Departamento de Cartera</h6>
                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="nombreContactoCartera"
                                                                                name="nombreContactoCartera"
                                                                                @if ($contactoCartera->nombre_contacto == 'null') @else
                                                                            value="{{ $contactoCartera->nombre_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="nombreContacto">Nombre</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="number"
                                                                                id="celularContactoCartera"
                                                                                name="celularContactoCartera"
                                                                                @if ($contactoCartera->celular_contacto == 'null') @else
                                                                            value="{{ $contactoCartera->celular_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Celular">Celular</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="direccionContactoCartera"
                                                                                name="direccionContactoCartera"
                                                                                @if ($contactoCartera->direccion_contacto == 'null') @else
                                                                            value="{{ $contactoCartera->direccion_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Direccion">Dirección</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="email"
                                                                                id="emailContactoCartera"
                                                                                name="emailContactoCartera"
                                                                                @if ($contactoCartera->email_contacto == 'null') @else
                                                                            value="{{ $contactoCartera->email_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Email">Email</label>
                                                                        </div>
                                                                    </div>

                                                                    <hr>
                                                                    <h6 class="">Departamento de Bodega</h6>
                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="nombreContactoBodega"
                                                                                name="nombreContactoBodega"
                                                                                @if ($contactoBodega->nombre_contacto == 'null') @else
                                                                            value="{{ $contactoBodega->nombre_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="nombreContacto">Nombre</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="number"
                                                                                id="celularContactoBodega"
                                                                                name="celularContactoBodega"
                                                                                @if ($contactoBodega->celular_contacto == 'null') @else
                                                                            value="{{ $contactoBodega->celular_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Celular">Celular</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="text"
                                                                                id="direccionContactoBodega"
                                                                                name="direccionContactoBodega"
                                                                                @if ($contactoBodega->direccion_contacto == 'null') @else
                                                                            value="{{ $contactoBodega->direccion_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Direccion">Dirección</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="email"
                                                                                id="emailContactoBodega"
                                                                                name="emailContactoBodega"
                                                                                @if ($contactoBodega->email_contacto == 'null') @else
                                                                            value="{{ $contactoBodega->email_contacto }}" @endif
                                                                                @required(true) />
                                                                            <label for="Email">Email</label>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="card  mb-6">

                                                        <div class="card-body">

                                                            <div class="card-body pt-0">

                                                                <div class="row g-5">
                                                                    <h5 class="card-header ">CAMARA DE COMERCIO
                                                                    </h5>
                                                                    <small class="text-danger">
                                                                        @if ($proveedor->camara_comercio == null)
                                                                            *Debe adjuntar camara de comercio*
                                                                        @else
                                                                            *Para actualizar la cámara de comercio,
                                                                            adjunte
                                                                            el nuevo PDF. Si no desea actualizarla,
                                                                            no
                                                                            adjunte ningún documento.*
                                                                        @endif

                                                                    </small>

                                                                    <div class="col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="file"
                                                                                id="camaraComercio"
                                                                                name="camaraComercio"
                                                                                accept="application/pdf"
                                                                                @if ($proveedor->camara_comercio == null) @required(true) @endif />
                                                                            <label for="camaraComercio">Camara de
                                                                                Comercio</label>
                                                                            <small>CAMARA DE COMERCIO FORMATO PDF
                                                                                (MAX.
                                                                                1MB).
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                </div>


                                                            </div>

                                                        </div>

                                                    </div>



                                                    <div class="d-flex justify-content-end gap-4">
                                                        <div class="mt-0">
                                                            <small class="text-danger"> *Para actualizar todos los
                                                                datos, debe verificar sus cuentas bancarias.*
                                                            </small>
                                                        </div>
                                                        <div class="mt-0">
                                                            <button type="submit"
                                                                class="btn btn-primary me-3">Guardar y
                                                                continuar</button>
                                                        </div>
                                                    </div>




                                                </form>
                                            </div>
                                        </div>
                                        <!-- /Options-->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- / Content -->

                    <!-- Footer -->
                    <livewire:footer />
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>


</x-app-layout>
