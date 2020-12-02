@if (count($apartment->images) == 5)
    <div class="main_pic " data-toggle="modal" data-target="#exampleModalCenter">
        <img class="ap_img" src="{{ $apartment->images[0]->img }}" alt="home_pic">
    </div>
    <div class="pic_col piclmiddle">
        <div class="piccol_pic "  data-toggle="modal" data-target="#exampleModalCenter1">
            <img class="ap_img" src="{{ $apartment->images[1]->img }}" alt="">
        </div>
        <div class="piccol_pic"  data-toggle="modal" data-target="#exampleModalCenter2">
            <img class="ap_img" src="{{ $apartment->images[2]->img }}" alt="">
        </div>
    </div>
    <div class="pic_col">
        <div class="piccol_pic"  data-toggle="modal" data-target="#exampleModalCenter3">
            <img class="ap_img" src="{{ $apartment->images[3]->img }}" alt="">
        </div>
        <div class="piccol_pic"  data-toggle="modal" data-target="#exampleModalCenter4">
            <img class="ap_img" src="{{ $apartment->images[4]->img }}" alt="">
        </div>
    </div>

{{-- modals --}}
<!-- Modal -->

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class=" modal-content-t2 " >
          <img class="ap_img " id="modal-img-t2" src="{{ $apartment->images[0]->img }}" alt="">
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class=" modal-content-t2 " >
          <img class="ap_img " id="modal-img-t2" src="{{ $apartment->images[1]->img }}" alt="">
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class=" modal-content-t2 " >
          <img class="ap_img " id="modal-img-t2" src="{{ $apartment->images[2]->img }}" alt="">
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter3" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class=" modal-content-t2 " >
          <img class="ap_img " id="modal-img-t2" src="{{ $apartment->images[3]->img }}" alt="">
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalCenter4" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class=" modal-content-t2 " >
          <img class="ap_img " id="modal-img-t2" src="{{ $apartment->images[4]->img }}" alt="">
    </div>
  </div>
</div>


@else
    <span class="invalid-feedback is-invalid" style="display: block;">
        <h3><strong>*Il numero di immagini deve essere 5</strong></h3>
    </span>
@endif
