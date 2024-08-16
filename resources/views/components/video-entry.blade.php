<!-- resources/views/components/textarea-entry.blade.php -->
<div>
    <label>{{ $label }}</label>
    <video controls >
        <source src="{{ Storage::url('public/assets-client/videos/Courses/' . $value) }}" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ thẻ video.
    </video>
</div>
