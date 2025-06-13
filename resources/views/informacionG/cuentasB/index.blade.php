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

                                <livewire:CardInfo boton="banco" />

                                <!-- / Card Info -->
                            </div>
                        </div>
                        <!--/ Header -->


                    </div>

                    <!--  Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row gy-6">
                            @forelse  ($cuentas as $cuenta)
                                <div class="col-12 col-xl-5">
                                    <div class="card h-100">


                                        <div class="accordion accordion-arrow-left"
                                            id="ecommerceBillingAccordionPayment">
                                            <div class="accordion-item active">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4 collapse show"
                                                    id="{{ $cuenta->numero_cuenta }}" style="">
                                                    <a class="accordion-button px-2" data-bs-toggle="collapse"
                                                        data-bs-target="#{{ $cuenta->numero_cuenta }}"
                                                        aria-expanded="true"
                                                        aria-controls="{{ $cuenta->numero_cuenta }}" role="button">
                                                        <span
                                                            class="accordion-button-information d-flex align-items-center gap-4">
                                                            <span class="accordion-button-image">

                                                                <img src="../../assets/img/icons/payments/credit-card.png"
                                                                    class="img-fluid w-px-30 h-px-20"
                                                                    alt="master-card" />
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="h6 mb-1">{{ $cuenta->banco }}</span>
                                                                <span
                                                                    class="mb-0 text-body fw-normal">{{ $cuenta->numero_cuenta }}</span>
                                                            </span>
                                                        </span>
                                                    </a>

                                                </div>
                                                <div id="{{ $cuenta->numero_cuenta }}"
                                                    class="accordion-collapse collapse show"
                                                    aria-labelledby="{{ $cuenta->numero_cuenta }}"
                                                    data-bs-parent="#ecommerceBillingAccordionPayment" style="">
                                                    <div
                                                        class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap ms-6 ps-4 table-responsive">
                                                        <table
                                                            class="table table-sm table-borderless text-nowrap small">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="w-50">Titular de la
                                                                        Cuenta</td>
                                                                    <td class="text-heading fw-medium small">
                                                                        {{ $cuenta->titular_cuenta }}
                                                                    </td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="w-50">Formato de
                                                                        cuenta: </td>
                                                                    <td class="text-heading fw-medium small">
                                                                        {{ $cuenta->formato }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipo de Cuenta</td>
                                                                    <td class="text-heading fw-medium small">
                                                                        {{ $cuenta->tipo_cuenta }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tipo de Documento</td>
                                                                    <td class="text-heading fw-medium small">
                                                                        {{ $cuenta->observaciones }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nº de Convenio</td>
                                                                    <td class="text-heading fw-medium small">
                                                                        {{ $cuenta->numero_convenio }}
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                        <table class="table table-sm table-borderless text-nowrap">

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @empty
                                <div class="col-12 col-xl-5">
                                    <div class="card h-100">
                                        <div class="accordion accordion-arrow-left"
                                            id="ecommerceBillingAccordionPayment">
                                            <div class="accordion-item">
                                                <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                    id="headingPaymentMaster">
                                                    <a class="accordion-button collapsed px-2" data-bs-toggle="collapse"
                                                        data-bs-target="#sinCuenta" aria-expanded="false"
                                                        aria-controls="headingPaymentMaster" role="button">
                                                        <span
                                                            class="accordion-button-information d-flex align-items-center gap-4">
                                                            <span class="accordion-button-image">

                                                                <img src="../../assets/img/icons/payments/stripe.png"
                                                                    class="img-fluid w-px-30 h-px-20"
                                                                    alt="master-card" />
                                                            </span>
                                                            <span class="d-flex flex-column">
                                                                <span class="h6 mb-1">No tiene
                                                                    datos
                                                                    bancaria</span>
                                                                <span class="mb-0 text-body fw-normal">Agregue
                                                                    una cuenta bancaria</span>
                                                            </span>
                                                        </span>
                                                    </a>

                                                </div>
                                                <div id="sinCuenta" class="accordion-collapse collapse"
                                                    data-bs-parent="#ecommerceBillingAccordionPayment">
                                                    <div
                                                        class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap ms-6 ps-4 table-responsive">
                                                        <table
                                                            class="table table-sm table-borderless text-nowrap small">
                                                            <tr>
                                                                <td class="w-50">Titular de la
                                                                    Cuenta</td>
                                                                <td class="text-heading fw-medium small">
                                                                    Sin datos
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="w-50">Formato de
                                                                    cuenta: </td>
                                                                <td class="text-heading fw-medium small">
                                                                    Sin datos
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tipo de Cuenta</td>
                                                                <td class="text-heading fw-medium small">
                                                                    Sin datos
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tipo de Documento</td>
                                                                <td class="text-heading fw-medium small">
                                                                    Sin datos
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nº de Convenio</td>
                                                                <td class="text-heading fw-medium small">
                                                                    Sin datos
                                                                </td>
                                                            </tr>

                                                        </table>
                                                        <table class="table table-sm table-borderless text-nowrap">

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforelse


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
