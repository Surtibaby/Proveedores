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
                        <!-- Header -->
                        <div class="row">
                            <div class="col-12">

                                <!-- Card Info -->

                                <livewire:CardInfo boton="cuenta" />

                                <!-- / Card Info -->
                            </div>
                        </div>
                        <!--/ Header -->


                    </div>

                    <!--  Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-6">

                            <div class="col-12 col-xl-7">
                                <div class="card h-100">
                                    <div class="row row-bordered g-0">
                                        <div class="col-md-7 col-12 order-md-0">
                                            <div class="card-header">
                                                <h5 class="mb-0">INFORMACIÓN OFICINA PRINCIPAL</h5>
                                            </div>
                                            <div class="card-body">
                                                <ul class="list-unstyled my-3 py-1">
                                                    <li class="d-flex align-items-center mb-4">
                                                        <i class="ri-user-3-line ri-24px"></i><span
                                                            class="fw-medium mx-2">Representante Legal:</span>
                                                        <span>{{ $proveedor->representante_legal }}</span>
                                                    </li>

                                                    <li class="d-flex align-items-center mb-2">
                                                        <i class="ri-mail-open-line ri-24px"></i><span
                                                            class="fw-medium mx-2">Email:</span>
                                                        <span>{{ $proveedor->email }}</span>
                                                    </li>

                                                    <li class="d-flex align-items-center mb-4">
                                                        <i class="ri-phone-line ri-24px"></i><span
                                                            class="fw-medium mx-2">Celular:</span>
                                                        <span>{{ $proveedor->celular_representante }}</span>
                                                    </li>

                                                    <li class="d-flex align-items-center mb-4">
                                                        <i class="ri-road-map-line ri-24px"></i><span
                                                            class="fw-medium mx-2">Ciudad:</span>
                                                        <span>{{ $proveedor->ciudad_principal }}</span>
                                                    </li>

                                                    <li class="d-flex align-items-center mb-4">
                                                        <i class="ri-map-pin-line ri-24px"></i>
                                                        <span class="fw-medium mx-2">Dirección:</span>
                                                        <span>{{ $proveedor->direccion_principal }} </span>
                                                    </li>

                                                    <li class="d-flex align-items-center mb-4">
                                                        <i class="ri-star-smile-line ri-24px"></i><span
                                                            class="fw-medium mx-2">Marca:</span>
                                                        <span>{{ $proveedor->marca }}</span>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <!-- Performance Overview Chart-->
                            <div class="col-12 col-xl-5 col-md-5">
                                <div class="card h-100">
                                    <div class="card-header pb-1">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="mb-1">INFORMACIÓN DE CONTACTOS</h5>
                                        </div>
                                    </div>
                                    <div class="card-body">

                                        <div class="accordion accordion-arrow-left"
                                            id="ecommerceBillingAccordionAddress">

                                            <div class="accordion-item">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                    id="headingHome">
                                                    <a class="accordion-button px-2 collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressHome"
                                                        aria-expanded="false" aria-controls="headingHome"
                                                        role="button">
                                                        <span>
                                                            <span class="d-flex gap-2 mb-1 align-items-baseline">
                                                                <span
                                                                    class="h6 mb-0">{{ $contactoVenta->nombre_contacto }}</span>
                                                                <span
                                                                    class="badge bg-label-primary rounded-pill">Ventas</span>
                                                            </span>
                                                            <span
                                                                class="mb-0 text-body fw-normal">{{ $contactoVenta->celular_contacto }}</span>
                                                        </span>
                                                    </a>

                                                </div>
                                                <div id="ecommerceBillingAddressHome"
                                                    class="accordion-collapse collapse"
                                                    data-bs-parent="#ecommerceBillingAccordionAddress" style="">
                                                    <div class="accordion-body ps-6 ms-6">
                                                        <p class="mb-1">Email: {{ $contactoVenta->email_contacto }}
                                                        </p>
                                                        <p class="mb-1">Dirección:
                                                            {{ $contactoVenta->direccion_contacto }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                    id="headingOffice">
                                                    <a class="accordion-button px-2 collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressOffice"
                                                        aria-expanded="false" aria-controls="headingOffice"
                                                        role="button">
                                                        <span class="d-flex flex-column">
                                                            <span
                                                                class="h6 mb-1">{{ $contactoCartera->nombre_contacto }}
                                                                <span
                                                                    class="badge bg-label-success rounded-pill">Cartera</span>
                                                            </span>
                                                            <span
                                                                class="mb-0 text-body fw-normal">{{ $contactoCartera->celular_contacto }}</span>
                                                        </span>
                                                    </a>

                                                </div>
                                                <div id="ecommerceBillingAddressOffice"
                                                    class="accordion-collapse collapse" aria-labelledby="headingOffice"
                                                    data-bs-parent="#ecommerceBillingAccordionAddress" style="">
                                                    <div class="accordion-body ps-6 ms-6">
                                                        <p class="mb-1">Email:
                                                            {{ $contactoCartera->email_contacto }}</p>
                                                        <p class="mb-1">Dirección:
                                                            {{ $contactoCartera->direccion_contacto }}</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                    id="headingFamily">
                                                    <a class="accordion-button px-2 collapsed" data-bs-toggle="collapse"
                                                        data-bs-target="#ecommerceBillingAddressFamily"
                                                        aria-expanded="false" aria-controls="headingFamily"
                                                        role="button">
                                                        <span class="d-flex flex-column">
                                                            <span
                                                                class="h6 mb-1">{{ $contactoBodega->nombre_contacto }}
                                                                <span
                                                                    class="badge bg-label-warning rounded-pill">Bodega</span>

                                                            </span>
                                                            <span
                                                                class="mb-0 text-body fw-normal">{{ $contactoBodega->celular_contacto }}</span>
                                                        </span>
                                                    </a>

                                                </div>
                                                <div id="ecommerceBillingAddressFamily"
                                                    class="accordion-collapse collapse" aria-labelledby="headingFamily"
                                                    data-bs-parent="#ecommerceBillingAccordionAddress" style="">
                                                    <div class="accordion-body ps-6 ms-6">
                                                        <p class="mb-1">Email: {{ $contactoBodega->email_contacto }}
                                                        </p>
                                                        <p class="mb-1">Dirección:
                                                            {{ $contactoBodega->direccion_contacto }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <h6 class="mb-2 text-muted">Documentos</h6>

                            <div class="container-xxl flex-grow-1 container-p-y">
                                <div class="row gy-6">
                                    <!-- Cards documentos -->

                                    @if ($proveedor->rut == null)
                                    @else
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <div class="avatar me-4">
                                                            <div class="rounded-3">
                                                                <img src="../../assets//img/icons/misc/pdf.png"
                                                                    alt="img" width="15" class="me-2">
                                                            </div>
                                                        </div>
                                                        <div class="card-info">
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 me-2">Rut</h6>
                                                                <i class="ri-eye-line ri-20px"></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endif

                                    @if ($proveedor->camara_comercio == null)
                                    @else
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <div class="avatar me-4">
                                                            <div class="rounded-3">
                                                                <img src="../../assets//img/icons/misc/pdf.png"
                                                                    alt="img" width="15" class="me-2">
                                                            </div>
                                                        </div>
                                                        <div class="card-info">
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 me-2">Camara de Come...</h6>
                                                                <i class="ri-eye-line ri-20px"></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    @endif

                                    @if ($proveedor->cedula == null)
                                    @else
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center flex-wrap">
                                                        <div class="avatar me-4">
                                                            <div class="rounded-3">
                                                                <img src="../../assets//img/icons/misc/pdf.png"
                                                                    alt="img" width="15" class="me-2">
                                                            </div>
                                                        </div>
                                                        <div class="card-info">
                                                            <div class="d-flex align-items-center">
                                                                <h6 class="mb-0 me-2">Cedula Represen...</h6>
                                                                <i class="ri-eye-line ri-20px"></i>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!--/ Content -->


                        </div>
                    </div>

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
