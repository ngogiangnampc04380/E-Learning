<!-- resources/views/components/textarea-entry.blade.php -->
<div>
    
    <label>{{ $label }}</label>
    <video controls  style="height:70px; width: 140px;" >
        <source src="{{ url('https://storage.googleapis.com/entweb01/ENT01/folder-name/'.$getRecord()->path_video )}}" type="video/mp4">
        Trình duyệt của bạn không hỗ trợ thẻ video.
    </video>
    
</div>
