    <!-- Footer -->
    <footer class="bg-dark text-light">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    <img class="mb-4" src="<?= $GLOBALS['domain_static'] . '/assets/logo-maison-navbar-putih.webp' ?>" alt="Maison Living" height="40">
                </div>
                <div class="col-sm-12 col-md-5">
                    <div class="row mb-4">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="row mb-4">
                        <div class="col-sm-6 col-md-6 mb-4">
                            <h5>Kemang Jakarta</h5>
                            <p>
                                Jl. Raya Kemang Selatan No.31
                                Jakarta Selatan, 12730<br>
                            </p>
                            <div>
                                <a href="https://goo.gl/maps/YogV1V2a7HVtrFC97" target="_blank" class="text-reset">Open Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i></a><br>
                                WA : 0813-8818-0020<br>
                                Phone : 021-2272-0220
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 mb-4">
                            <h5>BSD Alam Sutera</h5>
                            <p>
                                Jl. Raya Serpong Km 8 No. 7
                                Tangerang Selatan, 15326<br>
                            </p>
                            <div>
                                <a href="https://goo.gl/maps/6ZeBuiVJioZoCq7r5" target="_blank" class="text-reset">Open Google Maps <i class="fa-solid fa-arrow-up-right-from-square"></i></a><br>
                                WA : 0819-3000-2525<br>
                                Phone : 021-5569-5924
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12">Opening Hours: Monday-Sunday, 10 AM - 8 PM</div>
                    </div>
                </div>
            </div>
            <div class="text-center p-4">&copy;<?= date("Y"); ?>. PT Maison Cipta Kreasindo</div>
        </div>

        </div>
    </footer>
    <!-- Footer -->

    <script src="https://fastly.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/07c871975a.js" crossorigin="anonymous"></script>
    <script src="https://fastly.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(
                function() {
                    $("#loadoverlay").fadeOut();
                }, 800);
            setTimeout(
                function() {
                    $("#loadoverlay").removeClass('d-flex');
                }, 1200);
        });
    </script>
    </body>

    </html>