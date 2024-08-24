<!-- resources/views/components/textarea-entry.blade.php -->
<div>
    <label>{{ $label }}</label>
    <video controls style="height:200px; width: 300px;"  >
        <source src="{{ Storage::url('public/' . $value) }}?v={{ time() }}" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ thẻ video.
    </video>
</div>
