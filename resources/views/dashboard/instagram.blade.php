@if(isset($instagram))
  @foreach ($instagram->data as $image)
    <div class="instagram_thumbnail">
      <img class="instagram_thumbnail_img" src="{{{$image->images->thumbnail->url}}}" alt="Instagram Image">
    </div>
  @endforeach
@endif