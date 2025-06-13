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

                                <livewire:CardInfo boton="negociacion" />

                                <!-- / Card Info -->
                            </div>
                        </div>
                        <!--/ Header -->


                    </div>

                    <!--  Content -->

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <div class="">
                            <div class="tab-content p-0">
                                <!-- Checkout Tab -->

                                @foreach ($negociacions as $negociacion)
                                    <div class="tab-pane fade show active" id="checkout" role="tabpanel">
                                        <div class="card mb-6">
                                            <div class="card-header">
                                                <div class="card-title m-0 text-center">
                                                    <h5 class="mb-0 ">BIENVENIDO AL GRUPO EMPRESARIAL
                                                        MINIPRECIOS/SURTIBABY</h5>
                                                    <p class="card-subtitle mt-0">Nos complace darle la bienvenida,
                                                        {{ $proveedor->razon_social }}. </p>
                                                    <p class="card-subtitle mt-4">Para avanzar con el proceso de
                                                        creación/actualización de datos, en base a las negociaciones
                                                        realizadas con su representante de ventas XXXXXXXXXX el día
                                                        XXXXXX, procedemos a detallar las condiciones pactadas para su
                                                        revisión y aprobación esto con el fin de dar facilidad de
                                                        nuestros procesos y en aras de intensificar nuestras relaciones
                                                        comerciales, le solicitamos amablemente responder el siguiente
                                                        formulario.
                                                    </p>
                                                </div>
                                            </div>

                                        </div>

                                        <!--- CONDICIONES DE NEGOCIACIÓN --->

                                        <div class="card mb-6">
                                            <div class="card-header">
                                                <h5 class="card-title m-0">1. CONDICIONES DE NEGOCIACIÓN:</h5>

                                                <p class="mb-2">Nos dirigimos a usted con el propósito de extender
                                                    nuestras Relaciones Comerciales y formalizar las Condiciones de
                                                    Negociación con las que trabajaremos en adelante.

                                                </p>

                                                <p class="mb-2">Dado que no nos encontramos de manera presencial,
                                                    hemos decidido establecer este Formulario Virtual para definir
                                                    claramente los Términos de nuestra Colaboración. A continuación, se
                                                    detallan las Condiciones de Negociación:

                                                </p>

                                                <p class="mb-2"><strong> A continuación, se
                                                        detallan las Condiciones de Negociación:</strong>

                                                </p>

                                            </div>
                                            <div class="card-body">
                                                <div class="mb-6">
                                                    <p class="mb-2">1.1. Confirme si los costos de los artículos
                                                        proporcionados por su Representante de Ventas en la Orden de
                                                        Pedido INCLUYEN IVA:
                                                        <strong class="text-primary">
                                                            @if ($negociacion->iva_incluido == 1)
                                                                Si
                                                            @else
                                                                No
                                                            @endif
                                                        </strong>
                                                    </p>

                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="iva" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="iva" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">1.2. El Descuento Comercial de su empresa es
                                                        <strong class="text-primary">{{ $negociacion->por_descuento }}
                                                            %</strong>
                                                        a
                                                        un plazo de <strong
                                                            class="text-primary">{{ $negociacion->plazo_descuento }}
                                                            Dias</strong>.
                                                    </p>
                                                    <p class="mb-0"> <strong>*El plazo de descuento se condiciona a
                                                            partir
                                                            de la
                                                            recepción de la mercancía en nuestras bodegas.
                                                        </strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="descuento" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="descuento" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>

                                                </div>
                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">1.3. ¿Indíquenos si el descuento se aplicaría a
                                                        pie de
                                                        la factura?:<strong class="text-primary">
                                                            @if ($negociacion->dto_pie_factura == 1)
                                                                Si
                                                            @else
                                                                No
                                                            @endif
                                                        </strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="iva" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="iva" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>
                                                </div>

                                                <!--- //// --->

                                                <div class="mb-2">
                                                    <p class="mb-2"> 1.4. Confirme si sus pedidos generan guía de
                                                        transportadora por cada despacho realizado: <strong
                                                            class="text-primary">
                                                            @if ($negociacion->genera_guia == 1)
                                                                Si
                                                            @else
                                                                No
                                                            @endif
                                                        </strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="guia" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="guia" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>

                                                </div>


                                                <!--- //// --->

                                                <div class="mb-2">
                                                    <p class="mb-2">1.5. La modalidad de flete negociado con su
                                                        representante de ventas fue la siguiente:
                                                        <strong class="text-primary">
                                                            @if ($negociacion->flete_100_proveedor == 1)
                                                                Flete 100% Proveedor
                                                            @endif

                                                            @if ($negociacion->flete_100_empresa == 1)
                                                                Flete 100% Empresa
                                                            @endif

                                                            @if ($negociacion->flete_50_50 == 1)
                                                                Flete 50% Proveedor, 50% Empresa
                                                            @endif

                                                        </strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="flete" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio" name="flete" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                        <!--- AVERÍAS, IMPERFECTOS O GARANTÍAS --->
                                        <div class="card mb-6">
                                            <div class="card-header">
                                                <h5 class="card-title m-0 mb-2 ">2. AVERÍAS, IMPERFECTOS O GARANTÍAS
                                                </h5>

                                                <p class="mb-2"><strong>Avería: </strong>Una avería se refiere a
                                                    cualquier daño o fallo que impida el funcionamiento correcto de un
                                                    producto. En términos de bodega, un producto averiado es aquel que
                                                    no puede ser utilizado debido a un defecto significativo.

                                                </p>

                                                <p class="mb-2"><strong>Imperfecto: </strong>Un producto imperfecto
                                                    es aquel que presenta defectos menores que no impiden su uso, pero
                                                    que afectan su apariencia o funcionalidad en menor medida. En
                                                    términos de bodega, los productos imperfectos son aquellos que no
                                                    cumplen con los estándares de calidad visual o funcional completos,
                                                    pero siguen siendo utilizables.
                                                </p>

                                                <p class="mb-2"><strong>Garantía para el Cliente: </strong>La
                                                    garantía para el cliente es un compromiso de nuestra parte para
                                                    reparar, reemplazar o reembolsar productos que presenten defectos de
                                                    fabricación o funcionamiento dentro de un período especificado.
                                                </p>

                                                <p class="mb-2"><strong>Con base a lo anterior explicado por favor
                                                        responda los siguientes preguntas:
                                                    </strong>
                                                </p>

                                            </div>
                                            <div class="card-body">
                                                <div class="mb-6">
                                                    <p class="mb-2">2.1. Indique el plazo de Reporte de Averías que
                                                        tienen
                                                        sus productos, luego de que la tienda reciba la mercancía
                                                        <strong
                                                            class="text-primary">{{ $negociacion->plazo_garantia_tienda }}
                                                            dias</strong>
                                                    </p>

                                                    <p class="mb-1"> <strong>*Plazo entendido que corre a partir
                                                            de
                                                            la Recepción de la Mercancía en Nuestras
                                                            bodegas</strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="averia" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="averia" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>

                                                    </div>

                                                </div>
                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">2.2. Indique si la garantía de sus productos,
                                                        luego de
                                                        que el cliente lo haya comprado, es de <strong
                                                            class="text-primary">{{ $negociacion->plazo_garantia_cliente }}
                                                            dias</strong>
                                                    </p>
                                                    <p class="mb-1"> <strong>*Plazo entendido que corre a partir de
                                                            la Recepción de la Mercancía en Nuestras bodegas</strong>
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="garantia" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="garantia" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>
                                            </div>


                                        </div>

                                        <!--- DEVOLUCION DE MERCANCIA: --->
                                        <div class="card mb-6">
                                            <div class="card-header">
                                                <h5 class="card-title m-0">3. DEVOLUCION DE MERCANCIA:</h5>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-6">
                                                    <p class="mb-2">3.1. Los productos sujetos a Devolución, como lo
                                                        son:
                                                        Mercancía No Pedida, Productos con defectos detectados en la
                                                        Recepción de la Mercancía que son debidamente reportados al
                                                        Proveedor, y excedentes de inventario. El Proveedor declara
                                                        entendido que dichos productos deberán ser retirados de nuestras
                                                        bodegas según la modalidad de envío escogida por su
                                                        Representante
                                                        <strong
                                                            class="text-primary">{{ $negociacion->tipo_retiro }}</strong>
                                                    </p>

                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="productoDevolucion" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="productoDevolucion" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>
                                                </div>
                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">3.2. Usted como Proveedor está comprometido a
                                                        despachar única y exclusivamente las referencias y cantidades
                                                        autorizadas por MINIPRECIOS Y/O SURTIBABY en la orden de Pedido
                                                        Activa y gestionada a través de su representante de ventas.
                                                        Además, los costos facturados serán los que estén especificados
                                                        en el pedido.

                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="despachar" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="despachar" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>

                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">3.3. Se comprometen a verificar, ANTES DE
                                                        FACTURAR,
                                                        que los PRECIOS FACTURADOS coincidan con los acordados en la
                                                        Orden de Pedido. En caso de discrepancias, deberán coordinar con
                                                        el área de Compras de Miniprecios y/o Surtibaby los ajustes
                                                        necesarios en la Orden de Pedido para evitar rechazos de las
                                                        facturas electrónicas debido a inconsistencias en la recepción.


                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="verificarFactura" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="verificarFactura" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>


                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">3.4. Se comprometen a generar un Aviso de
                                                        Despacho
                                                        para los pedidos a través de nuestra página web
                                                        www.proveedorsas.com , donde deberán cargar tanto la Factura
                                                        Electrónica como la Guía de la Transportadora.



                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="avisoDespacho" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="avisoDespacho" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>

                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">3.5. El proveedor asumirá en su totalidad los
                                                        costos
                                                        de flete de la Mercancía enviada, ya que no se acepta pago
                                                        contraentrega.
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="anomalias" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="anomalias" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>

                                                <!--- //// --->
                                                <div class="mb-6">
                                                    <p class="mb-2">3.5. En caso de que surjan anomalías en la
                                                        facturación
                                                        (sobrantes, faltantes, precios incorrectos)
                                                        , el Proveedor se
                                                        compromete a enviar las correspondientes notas de débito o
                                                        crédito en un plazo máximo de 72 horas a nuestras direcciones de
                                                        correo electrónico: carterampsas@gmail.com /
                                                        babyretailsas@gmail.com
                                                    </p>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="anomalias" />
                                                        <label class="form-check-label">
                                                            Acepto
                                                        </label>
                                                    </div>
                                                    <div class="form-check ms-2 mb-0">
                                                        <input class="form-check-input" type="radio"
                                                            name="anomalias" />
                                                        <label class="form-check-label">
                                                            No Acepto
                                                        </label>
                                                    </div>


                                                </div>



                                            </div>


                                        </div>

                                        <div class="d-flex justify-content-end gap-4">

                                            <a class="btn btn-primary waves-effect waves-light"
                                                href="#">Guardar</a>
                                        </div>
                                        <!--/ Checkout Tab -->
                                    </div>
                                @endforeach
                            </div>
                            <!-- /Options-->
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
