@if(isset($instagram))
  @if(isset($instagram->data))
    @foreach ($instagram->data as $image)
      <div class="instagram_thumbnail">
        <img class="instagram_thumbnail_img" src="{{{$image->images->thumbnail->url}}}" alt="Instagram Image">
      </div>
    @endforeach
  @else
    <div class="instagram_login">
      {!!$instagram!!}
    </div>
  @endif
@endif