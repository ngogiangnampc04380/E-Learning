<video style="height:70px" controls>
    <source src="{{ Storage::url('public/' . $getRecord()->video_demo) }}?v={{ time() }}" type="video/mp4">
    Your browser does not support the video tag.
</video>
