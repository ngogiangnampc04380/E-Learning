<!DOCTYPE html>
<html>
<head>
    <title>Chứng chỉ hoàn thành khóa học</title>
</head>
<body>
    <h1>Chúc mừng {{ $name }}!</h1>
    <p>Bạn đã hoàn thành khóa học "{{ $course->name }}" thành công.</p>
    <p>Chứng chỉ của bạn đã sẵn sàng.</p>
    <a href="{{ url('/certificate/' . auth()->user()->id . '/' . $course->id) }}">Tải chứng chỉ</a>
</body>
</html>
