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
                                                        <a class="nav-link "
                                                            href="{{ url('datos-basicos', ['datos-basicos' => 's54da645d']) }}">
                                                            <i class="ri-user-line me-2"></i>
                                                            <span class="align-middle">Datos Basicos</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item mb-1">
                                                        <a class="nav-link active" href="javascript:void(0);">
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


                                                <div class="card card-action mb-6">
                                                    <div class="card-header align-items-center flex-wrap gap-2">
                                                        <h5 class="card-action-title mb-0">Cuentas Bancarias</h5>
                                                        <div class="card-action-element">
                                                            <button class="btn btn-sm btn-outline-primary"
                                                                type="button" data-bs-toggle="modal"
                                                                data-bs-target="#addCuentaBancaria">
                                                                Agregar Nueva Cuenta Bancaria
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @forelse  ($cuentas as $cuenta)
                                                            <div class="accordion accordion-arrow-left"
                                                                id="ecommerceBillingAccordionPayment">
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                                        id="headingPaymentMaster">
                                                                        <a class="accordion-button collapsed px-2"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#{{ $cuenta->numero_cuenta }}"
                                                                            aria-expanded="false"
                                                                            aria-controls="headingPaymentMaster"
                                                                            role="button">
                                                                            <span
                                                                                class="accordion-button-information d-flex align-items-center gap-4">
                                                                                <span class="accordion-button-image">

                                                                                    <img src="../../assets/img/icons/payments/credit-card.png"
                                                                                        class="img-fluid w-px-30 h-px-20"
                                                                                        alt="master-card" />
                                                                                </span>
                                                                                <span class="d-flex flex-column">
                                                                                    <span
                                                                                        class="h6 mb-1">{{ $cuenta->banco }}</span>
                                                                                    <span
                                                                                        class="mb-0 text-body fw-normal">{{ $cuenta->numero_cuenta }}</span>
                                                                                </span>
                                                                            </span>
                                                                        </a>
                                                                        <div
                                                                            class="d-flex gap-4 p-4 p-sm-2 py-sm-0 pt-0 ms-4 ms-sm-0">
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#editModal{{ $cuenta->id }}"><i
                                                                                    class="ri-edit-box-line ri-22px text-body"></i></a>
                                                                            <a href="javascript:void(0);"
                                                                                data-bs-toggle="modal"
                                                                                data-bs-target="#eliminarModal{{ $cuenta->id }}"><i
                                                                                    class="ri-delete-bin-7-line ri-22px text-body"></i></a>

                                                                        </div>
                                                                    </div>
                                                                    <div id="{{ $cuenta->numero_cuenta }}"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#ecommerceBillingAccordionPayment">
                                                                        <div
                                                                            class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap ms-6 ps-4 table-responsive">
                                                                            <table
                                                                                class="table table-sm table-borderless text-nowrap small">
                                                                                <tr>
                                                                                    <td class="w-50">Titular de la
                                                                                        Cuenta</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        {{ $cuenta->titular_cuenta }}
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td class="w-50">Formato de
                                                                                        cuenta: </td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        {{ $cuenta->formato }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tipo de Cuenta</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        {{ $cuenta->tipo_cuenta }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tipo de Documento</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        {{ $cuenta->observaciones }}
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Nº de Convenio</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        {{ $cuenta->numero_convenio }}
                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                            <table
                                                                                class="table table-sm table-borderless text-nowrap">

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        @empty
                                                            <div class="accordion accordion-arrow-left"
                                                                id="ecommerceBillingAccordionPayment">
                                                                <div class="accordion-item">
                                                                    <div class="accordion-header d-flex justify-content-between align-items-center flex-wrap flex-sm-nowrap row-gap-4"
                                                                        id="headingPaymentMaster">
                                                                        <a class="accordion-button collapsed px-2"
                                                                            data-bs-toggle="collapse"
                                                                            data-bs-target="#sinCuenta"
                                                                            aria-expanded="false"
                                                                            aria-controls="headingPaymentMaster"
                                                                            role="button">
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
                                                                                    <span
                                                                                        class="mb-0 text-body fw-normal">Agregue
                                                                                        una cuenta bancaria</span>
                                                                                </span>
                                                                            </span>
                                                                        </a>

                                                                    </div>
                                                                    <div id="sinCuenta"
                                                                        class="accordion-collapse collapse"
                                                                        data-bs-parent="#ecommerceBillingAccordionPayment">
                                                                        <div
                                                                            class="accordion-body d-flex align-items-baseline flex-wrap flex-xl-nowrap flex-sm-nowrap flex-md-wrap ms-6 ps-4 table-responsive">
                                                                            <table
                                                                                class="table table-sm table-borderless text-nowrap small">
                                                                                <tr>
                                                                                    <td class="w-50">Titular de la
                                                                                        Cuenta</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        Sin datos
                                                                                    </td>
                                                                                </tr>

                                                                                <tr>
                                                                                    <td class="w-50">Formato de
                                                                                        cuenta: </td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        Sin datos
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tipo de Cuenta</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        Sin datos
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Tipo de Documento</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        Sin datos
                                                                                    </td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Nº de Convenio</td>
                                                                                    <td
                                                                                        class="text-heading fw-medium small">
                                                                                        Sin datos
                                                                                    </td>
                                                                                </tr>

                                                                            </table>
                                                                            <table
                                                                                class="table table-sm table-borderless text-nowrap">

                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <!--/ Payment accordion -->

                                                @foreach ($cuentas as $cuenta)
                                                    <!-- modificar cuentas -->
                                                    <div class="modal fade" id="editModal{{ $cuenta->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-lg modal-simple modal-add-new-address">
                                                            <div class="modal-content">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                                <div class="modal-body p-0">
                                                                    <div class="text-center mb-5">
                                                                        <h4 class="address-title mb-2">Actualizar
                                                                            Cuenta Bancaria</h4>
                                                                    </div>

                                                                    <form class="row g-5" method="POST"
                                                                        action="{{ route('cuentas-bancarias.update', $cuenta->id) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('PUT')

                                                                        <div class="col-12 col-md-6">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <select id="banco{{ $cuenta->id }}"
                                                                                    name="banco"
                                                                                    class="select2 form-select"
                                                                                    data-allow-clear="true"
                                                                                    @required(true)>
                                                                                    <option
                                                                                        value="{{ $cuenta->banco }}">
                                                                                        {{ $cuenta->banco }}
                                                                                    </option>
                                                                                    @foreach ($bancos as $banco)
                                                                                        <option
                                                                                            value="{{ $banco->banco }}">
                                                                                            {{ $banco->banco }}
                                                                                        </option>
                                                                                    @endforeach

                                                                                </select>
                                                                                <label>Banco</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <select
                                                                                    id="formatoCuenta{{ $cuenta->id }}"
                                                                                    name="formatoCuenta"
                                                                                    class="select2 form-select"
                                                                                    data-allow-clear="true"
                                                                                    @required(true)>
                                                                                    <option
                                                                                        value="{{ $cuenta->formato }}">
                                                                                        {{ $cuenta->formato }}
                                                                                    </option>
                                                                                    <option value="Normal">Normal
                                                                                    </option>
                                                                                    <option value="Recaudo">Recaudo
                                                                                    </option>
                                                                                </select>
                                                                                <label>Formato de cuenta</label>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-12 col-md-6">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <select
                                                                                    id="tipoCuenta{{ $cuenta->id }}"
                                                                                    name="tipoCuenta"
                                                                                    class="select2 form-select"
                                                                                    data-allow-clear="true"
                                                                                    @required(true)>
                                                                                    <option
                                                                                        value="{{ $cuenta->tipo_cuenta }}">
                                                                                        {{ $cuenta->tipo_cuenta }}
                                                                                    </option>
                                                                                    <option value="Corriente">Corriente
                                                                                    </option>
                                                                                    <option value="Ahorro">Ahorro
                                                                                    </option>
                                                                                </select>
                                                                                <label>Tipo de Cuenta</label>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-12 col-md-6">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <select
                                                                                    id="tipoDocumento{{ $cuenta->id }}"
                                                                                    name="tipoDocumento"
                                                                                    class="select2 form-select"
                                                                                    data-allow-clear="true"
                                                                                    @required(true)>
                                                                                    <option
                                                                                        value="{{ $cuenta->observaciones }}">
                                                                                        {{ $cuenta->observaciones }}
                                                                                    </option>
                                                                                    <option value="Factura">Factura
                                                                                    </option>
                                                                                    <option value="Remision">Remision
                                                                                    </option>
                                                                                    <option value="Fact/Rem">
                                                                                        Factura/Remision
                                                                                    </option>
                                                                                </select>
                                                                                <label>Tipo de Documento</label>
                                                                            </div>
                                                                        </div>


                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <input type="number"
                                                                                    id="modalAddressAddress1"
                                                                                    name="numeroCuenta"
                                                                                    class="form-control"
                                                                                    @required(true)
                                                                                    value="{{ $cuenta->numero_cuenta }}" />
                                                                                <label
                                                                                    for="modalAddressAddress1">Numero
                                                                                    de
                                                                                    la Cuenta</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <input type="text"
                                                                                    id="modalAddressAddress2"
                                                                                    name="titularCuenta"
                                                                                    class="form-control"
                                                                                    @required(true)
                                                                                    value="{{ $cuenta->titular_cuenta }}" />
                                                                                <label
                                                                                    for="modalAddressAddress2">Titular
                                                                                    de la Cuenta</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-md-6">
                                                                            <div
                                                                                class="form-floating form-floating-outline">
                                                                                <input type="text"
                                                                                    id="modalAddressLandmark"
                                                                                    name="numeroConvenio"
                                                                                    class="form-control"
                                                                                    value="{{ $cuenta->numero_convenio }}" />
                                                                                <label for="modalAddressLandmark">Nº de
                                                                                    Convenio</label>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-12 md-2">
                                                                            <small class="text-danger ">
                                                                                *Para actualizar el certificado
                                                                                bancario, adjunte el nuevo PDF. Si no
                                                                                desea actualizarlo, no adjunte ningún
                                                                                documento.*
                                                                            </small>
                                                                            <div
                                                                                class="form-floating form-floating-outline md-2">
                                                                                <input class="form-control"
                                                                                    type="file" id="certificado"
                                                                                    name="certificado"
                                                                                    accept="application/pdf" />
                                                                                <label for="certificado">Certificado
                                                                                    Bancario</label>
                                                                                <small>FORMATO PDF (MAX. 1MB).
                                                                                </small>
                                                                            </div>
                                                                        </div>

                                                                        <div
                                                                            class="col-12 mt-6 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Agregar
                                                                                Cuenta</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancelar
                                                                            </button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modificar cuentas -->


                                                    <!-- Elimina cuentas -->
                                                    <div class="modal fade" id="eliminarModal{{ $cuenta->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div
                                                            class="modal-dialog modal-dialog-centered modal-simple modal-add-new-cc">
                                                            <div class="modal-content">
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                                <div class="modal-body p-0">
                                                                    <div class="text-center mb-5">
                                                                        <h4 class="address-title mb-2">Eliminar
                                                                            Cuenta Bancaria</h4>
                                                                    </div>

                                                                    <h6 class="text-center">Banco:
                                                                        {{ $cuenta->banco }} </h6>
                                                                    <h6 class="text-center"># Cuenta:
                                                                        {{ $cuenta->numero_cuenta }} </h6>

                                                                    <form class="row g-5" method="POST"
                                                                        action="{{ route('cuentas-bancarias.destroy', $cuenta->id) }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <div
                                                                            class="col-12 mt-6 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                                                                            <button type="submit"
                                                                                class="btn btn-danger">Eliminar
                                                                                Cuenta</button>
                                                                            <button type="reset"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close">
                                                                                Cancelar
                                                                            </button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/ Modificar cuentas -->
                                                @endforeach

                                                <!-- Agregar Nueva Cuenta Bancaria -->
                                                <div class="modal fade" id="addCuentaBancaria" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div
                                                        class="modal-dialog modal-lg modal-simple modal-add-new-address">
                                                        <div class="modal-content">
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                            <div class="modal-body p-0">
                                                                <div class="text-center mb-5">
                                                                    <h4 class="address-title mb-2">Agregar Nueva
                                                                        Cuenta Bancaria</h4>
                                                                </div>

                                                                <form class="row g-5" method="POST"
                                                                    action="{{ url('cuentas-bancarias') }}"
                                                                    enctype="multipart/form-data">
                                                                    @csrf


                                                                    <div class="col-12 col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <select id="banco" name="banco"
                                                                                class="select2 form-select"
                                                                                data-allow-clear="true"
                                                                                @required(true)>
                                                                                <option value=""></option>
                                                                                @foreach ($bancos as $banco)
                                                                                    <option
                                                                                        value="{{ $banco->banco }}">
                                                                                        {{ $banco->banco }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            <label>Banco</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <select id="formatoCuenta"
                                                                                name="formatoCuenta"
                                                                                class="select2 form-select"
                                                                                data-allow-clear="true"
                                                                                @required(true)>
                                                                                <option value=""></option>
                                                                                <option value="Normal">Normal
                                                                                </option>
                                                                                <option value="Recaudo">Recaudo
                                                                                </option>
                                                                            </select>
                                                                            <label>Formato de cuenta</label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-12 col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <select id="tipoCuenta" name="tipoCuenta"
                                                                                class="select2 form-select"
                                                                                data-allow-clear="true"
                                                                                @required(true)>
                                                                                <option value=""></option>
                                                                                <option value="Corriente">Corriente
                                                                                </option>
                                                                                <option value="Ahorro">Ahorro
                                                                                </option>
                                                                            </select>
                                                                            <label>Tipo de Cuenta</label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-12 col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <select id="tipoDocumento"
                                                                                name="tipoDocumento"
                                                                                class="select2 form-select"
                                                                                data-allow-clear="true"
                                                                                @required(true)>
                                                                                <option value=""></option>
                                                                                <option value="Factura">Factura
                                                                                </option>
                                                                                <option value="Remision">Remision
                                                                                </option>
                                                                                <option value="Fact/Rem">
                                                                                    Factura/Remision
                                                                                </option>
                                                                            </select>
                                                                            <label>Tipo de Documento</label>
                                                                        </div>
                                                                    </div>


                                                                    <div class="col-12">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input type="number"
                                                                                id="modalAddressAddress1"
                                                                                name="numeroCuenta"
                                                                                class="form-control"
                                                                                @required(true) />
                                                                            <label for="modalAddressAddress1">Numero de
                                                                                la Cuenta</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input type="text"
                                                                                id="modalAddressAddress2"
                                                                                name="titularCuenta"
                                                                                class="form-control"
                                                                                @required(true) />
                                                                            <label for="modalAddressAddress2">Titular
                                                                                de la Cuenta</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input type="text"
                                                                                id="modalAddressLandmark"
                                                                                name="numeroConvenio"
                                                                                class="form-control" />
                                                                            <label for="modalAddressLandmark">Nº de
                                                                                Convenio</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-12">
                                                                        <div
                                                                            class="form-floating form-floating-outline">
                                                                            <input class="form-control" type="file"
                                                                                id="certificado" name="certificado"
                                                                                accept="application/pdf"
                                                                                @required(true) />
                                                                            <label for="certificado">Certificado
                                                                                Bancario</label>
                                                                            <small>FORMATO PDF (MAX. 1MB).
                                                                            </small>
                                                                        </div>
                                                                    </div>

                                                                    <div
                                                                        class="col-12 mt-6 d-flex flex-wrap justify-content-center gap-4 row-gap-4">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Agregar
                                                                            Cuenta</button>
                                                                        <button type="reset"
                                                                            class="btn btn-outline-secondary"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close">
                                                                            Cancelar
                                                                        </button>
                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--/ Add New Address Modal -->
                                                <div class="alert alert-warning alert-dismissible" role="alert">
                                                    <h4 class="alert-heading d-flex align-items-center"><span
                                                            class="alert-icon rounded"><i
                                                                class="ri-alert-line ri-22px"></i></span>¡IMPORTANTE!
                                                    </h4>
                                                    <hr>
                                                    <p class="mb-0">Asegurese de finalizar el proceso de
                                                        actulizacion de datos haciendo clik en el boton
                                                        <strong>"Actulizar todos
                                                            los
                                                            datos"</strong>
                                                    </p>
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close">
                                                    </button>
                                                </div>

                                                <form method="GET"
                                                    action="{{ url('validador-registro', ['validador-registro' => $proveedor->nit]) }}">
                                                    <div class="d-flex justify-content-end gap-4">
                                                        <div class="mt-0">
                                                            <small class="text-danger"> *¡Atención! Una vez que
                                                                actualices
                                                                los
                                                                datos,
                                                                ya no
                                                                podrás hacer cambios* </small>
                                                        </div>
                                                        <div class="mt-0">
                                                            <button type="submit"
                                                                class="btn btn-primary me-3">Actualizar todos los
                                                                datos</button>
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
