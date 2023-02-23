@extends('layouts.home')
@section('title')
<title>Gallery | HR-Soft</title>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('css/grid-gallery.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
<style>
    dl,
    ol,
    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .imgPreview img {
        padding: 8px;
        max-width: 250px;
    }
</style>
@endsection
@section('content')
<div class="header-divider"></div>
<div class="body flex-grow-1 px-3">
    <div class="container-lg">
        <div class="card mb-4">
            <div class="card-body">
                <section class="gallery-block grid-gallery">
                    <div class="container" id="cont">
                        <div class="heading">
                            <h2>Gallery</h2>
                            @if (Auth::user()->status == 0)
                            <input type="hidden" id="no_rows" name="noof_rows" value="5" />
                            <button type="button" class="btn btn-primary float-end" data-coreui-toggle="modal"
                                data-coreui-target=".addImageModal1">Create
                                Event <svg class="icon">
                                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                                </svg></button>
                            @endif
                        </div>
                        {{-- modal upload image start --}}
                        <div class="modal fade addImageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Add Images</h5>
                                        <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('galleryUpload') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="user-image mb-3 text-center">
                                                <div class="imgPreview"> </div>
                                            </div>
                                            <div class="mb-3">
                                                <input type="hidden" value="" id="EventNeme" name="EventNeme" value="" />
                                                <input type="file" name="imageFile[]" class="form-control" id="images"
                                                    multiple="multiple">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-coreui-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- modal for upload image end --}}
                        {{-- modal for create Event start --}}
                        <div class="modal fade addImageModal1" tabindex="-1" aria-labelledby="exampleModalLabel1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Create Event</h5>
                                        <button type="button" class="btn-close" data-coreui-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="text" name="Event" class="form-control" value="" id="Event">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-coreui-dismiss="modal">Close</button>
                                        <button type="button" id="CreateButton" class="btn btn-primary clickone"
                                            >Create</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- modal for create Event end --}}
                        
                        <div class="accordion" id="accordionExample">
                            @foreach ($events as $event)
                            <div class="accordion-item">
                                <h2 class="accordion-header  d-flex mr-2 g-2" id="heading{{$event->event}}" style="">
                                    <button class="accordion-button collapsed" type="button"
                                        data-coreui-toggle="collapse" data-coreui-target="#collapse{{$event->event}}"
                                        aria-expanded="false" aria-controls="collapseOne">
                                        {{$event->event}}
                                    </button>
                                    @if (Auth::user()->status == 0)
                                    <div class="accordion-header  d-flex justify-content-center align-items-center" style="background: #ece9fa">
                                        <form action="{{ route('galleryeventdelete') }}" method="POST" id="FormSubmit">
                                            @csrf
                                            
                                            <input type="hidden" name="event" value="{{$event->event}}" />
                                            <input type="hidden" name="id" value="" />
                                            <button type="button" style="color:#ece9fa;border:none;" onclick="ConfirmToDelete()">
                                                <svg class="icon text-black">
                                                    <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                </svg>
                                            </button>
                                        </form>
                                    <div>
                                    @endif
                                </h2>
                                <div id="collapse{{$event->event}}" class="accordion-collapse collapse "
                                    aria-labelledby="heading{{$event->event}}" data-coreui-parent="#accordionExample">
                                    <div class="accordion-body d-flex flex-column">
                                        <div class="row">
                                            @foreach ($galleries as $item)
                                            @if ($item->event==$event->event)
                                                @foreach (json_decode($item->name) as $image)
                                                <div class="col-md-6 col-lg-4 item">
                                                    @if (Auth::user()->status == 0)
                                                        <form action="{{ route('gallerydelete') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="Image" value="{{$image}}"/>
                                                            <input type="hidden" name="id" value="{{$item->id}}"/>
                                                                <button class="btn btn-danger btn-sm" style="position:absolute;z-index:9;">
                                                                    <svg class="icon text-white">
                                                                        <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                                                                    </svg></button>
                                                        </form>
                                                     @endif
                                                    <a class="lightbox" href="/Gallery/{{ $image }}">
                                                        <img class="img-fluid image scale-on-hover" style="object-fit: cover; width: 100%; height: 250px"
                                                            src="/Gallery/{{ $image }}">
                                                    </a>
                                                </div>
                                                @endforeach
                                            @endif
                                            @endforeach
                                        </div>
                                        @if (Auth::user()->status == 0)
                                        <a class="btn btn-sm btn-primary float-start clearfix"
                                            data-coreui-toggle="modal" data-coreui-target=".addImageModal" onclick="addEventName('{{$event->event}}')">
                                            <svg class="icon">
                                                <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                                            </svg> Add Images</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.grid-gallery', {
            animation: 'slideIn'
        });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(
                                imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };
            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });
</script>



<script>
    const ConfirmToDelete=()=>{
        var result = confirm("Wants to delete this Event !!! Your All Data will be deleted .");
        if (result == true) {
        document.getElementById('FormSubmit').submit();
        }
    }
    const addEventName=(add)=>{
        document.getElementById("EventNeme").value=add;
    }
    var btn=document.querySelector(".clickone");
    btn.addEventListener("click",AddAccordion);
    function AddAccordion(){
    document.getElementById("EventNeme").value=document.getElementById('Event').value.trim();
    if(document.querySelector('#Event').value.length == 0){
        alert("Please Enter a Task");
    }else{
        document.getElementById('CreateButton').style.display='none';
        let event=(document.getElementById('Event').value).trim();
        document.querySelector('#accordionExample').innerHTML += `<div class="accordion-item">
            <h2 class="accordion-header" id="heading${event}">
                <button class="accordion-button collapsed" type="button" data-coreui-toggle="collapse"
                    data-coreui-target="#collapse${event}" aria-expanded="false" aria-controls="collapse${event}">
                    ${event}
                </button>
            </h2>
            <div id="collapse${event}" class="accordion-collapse collapse" aria-labelledby="heading${event}"
                data-coreui-parent="#accordionExample">
                <div class="accordion-body">
                    @if (Auth::user()->status == 0)
                    <a class="btn btn-sm btn-primary float-start clearfix" data-coreui-toggle="modal" data-coreui-target=".addImageModal">
                        <svg class="icon">
                            <use xlink:href="/vendors/@coreui/icons/svg/free.svg#cil-plus"></use>
                        </svg> Add Images</a>
                    @endif
                </div>
            </div>
        </div>`;
    }
}
</script>
@endsection