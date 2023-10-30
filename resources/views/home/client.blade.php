<section class="client_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Testimoni Perusahaan
            </h2>
        </div>

        <div class="row">
            @foreach($perusahaan as $data)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box col-lg-10 mx-auto">
                    <div class="img_container">
                        <div class="img-box">
                            <div class="img_box-inner">
                                <img src="perusahaan/{{ $data->image }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $data->title_perusahaan }}
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="row">
            <span class="mt-5" style="margin:auto">
                {!!$perusahaan->links()!!}
            </span>
        </div>
    </div>
</section>