<title>pengumuman</title>
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class=" container">
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-9">
                <div class="card card-custom gutter-b">
                    <div class="card-header">
                        <div class="card-title">
                            <h3 class="card-label">
                                Baca pengumuman
                            </h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="h1 text-center">Membandel, Pabrik Tahu Tempe Disegel Satpol PP</div>
                    </div>

                    <!--begin::Footer-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">
                        <!--begin::Container-->
                        <div
                            class=" container  d-flex flex-column flex-md-row align-items-center justify-content-between">
                            <!--begin::Copyright-->
                            <div class="text-dark order-2 order-md-1">
                                <span class="text-dark font-weight-bold mr-2" id="display-date">2020-02-01</span>

                            </div>
                            <!--end::Copyright-->

                            <?php $this->load->view('layouts/partials/sosial') ?>

                            <!--end::Nav-->
                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Footer-->

                    <!--begin::Engage Widget 4-->
                    <div class="card-body" style="
                            padding-top: 0px;
                            padding-bottom: 0px;
                        ">

                        <!--end::Engage Widget 4-->
                    </div>

                    <div class="card-body">
                        <p>
                            asddddddddddddddddddddddddddddddddddddddd
                        </p>
                    </div>
                </div>

                <div class="card card-custom gutter-b">
                    <!--begin::List Widget 11-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0">
                            <h3 class="card-title font-weight-bolder text-dark">Artikel Terbaru Lainnya</h3>

                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body pt-0">
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                                <!--begin::Title-->
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bold text-dark-75 text-hover-primary font-size-lg ">Sidang
                                        Pers- Gianyar Terpilih Sebagai Anggota Organisasi Kota Pusaka Indonesia</a>
                                    <span class="text-muted font-size-xs font-weight-bold">Due in 2 Days</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                                <!--begin::Title-->
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bold text-dark-75 text-hover-primary font-size-lg ">Sidang
                                        Pers- Gianyar Terpilih Sebagai Anggota Organisasi Kota Pusaka Indonesia</a>
                                    <span class="text-muted font-size-xs font-weight-bold">Due in 2 Days</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-9 bg-light-warning rounded p-5">
                                <!--begin::Title-->
                                <div class="d-flex flex-column flex-grow-1 mr-2">
                                    <a href="#"
                                        class="font-weight-bold text-dark-75 text-hover-primary font-size-lg ">Sidang
                                        Pers- Gianyar Terpilih Sebagai Anggota Organisasi Kota Pusaka Indonesia</a>
                                    <span class="text-muted font-size-xs font-weight-bold">Due in 2 Days</span>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <a href="#" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2">Lihat Selengkapnya</a>

                        </div>
                        <!--end::Body-->
                        
                    </div>

                    <!--end::List Widget 11-->
                    
                </div>

            </div>
            <?php $this->load->view('layouts/partials/side.php'); ?>

        </div>
        

        <!--end::Row-->

    </div>
    <!--end::Container-->
    
</div>
<!--end::Entry-->
<script>
    function formatTextDate(date_string, id) {

        var d_names = ["Minggu", "Senen", "Selasa",
            "Rabu", "Kamis", "Jumat", "Sabtu"
        ];

        var m_names = ["Januari", "Februari", "Maret",
            "April", "Mei", "Juni", "Juli", "Augustus", "September",
            "Oktober", "November", "Desember"
        ];

        var dateArray = date_string.split(
            "-"
            ); //Need to convert to Array to get to work in all browsers. Example format: Year, month, day: 2013-06-18
        var d = new Date(dateArray[0], dateArray[1] - 1, dateArray[2]); //Subtract 1 from the month because it is 0-11
        var s_day = d.getDay();
        var s_date = d.getDate();
        var sup = ""; //To add superscript text to date.
        var s_month = d.getMonth();
        var s_year = d.getFullYear();

        //Following code is optional for adding a superscript to the day of the week

        if (s_date == 1 || s_date == 21 || s_date == 31) {
            sup = "st";
        } else if (s_date == 2 || s_date == 22) {
            sup = "nd";
        } else if (s_date == 3 || s_date == 23) {
            sup = "rd";
        } else {
            sup = "th";
        }

        // Example of "sup": document.write(d_names[s_day] + ", " + m_names[s_month] + " " + s_date + sup + ", " + s_year);

        var output_date = d_names[s_day] + ", " + s_date + " " + m_names[s_month] + " " + s_year;

        //console.log(output_date);

        // Pass the string to an element by ID or to a text input by ID
        if (document.getElementById) {
            x = document.getElementById(id);
        } else if (document.all) //For IE Support
        {
            x = document.all[id];
        }

        if (x.tagName && x.tagName.toLowerCase() == "input" && x.type.toLowerCase() ==
            "text") { //Check if this is a text input
            console.log('this is a text input');
            x.value = '';
            x.value = output_date;
        } else { //Else this is an element
            console.log('this is an element');
            x.innerHTML = '';
            x.innerHTML = output_date;
        }

    }

    var span_Text = document.getElementById("display-date").innerText;

    formatTextDate(span_Text, "display-date");
    formatTextDate("2013-12-22", "display-date2");
    //-->
</script>