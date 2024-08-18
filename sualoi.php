<php>
    <!-- mẫu -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-quiz-list').forEach(button => {
            button.addEventListener('click', function () {
                const chapterId = this.getAttribute('data-chapter-id');
                const quizList = document.querySelector(`.quiz-list[data-chapter-id="${chapterId}"]`);

                if (quizList) {
                    if (quizList.style.display === 'none') {
                        quizList.style.display = 'block';
                        this.innerHTML = '<i class="fas fa-chevron-up"></i> Ẩn bài quiz'; // Thay đổi nút thành 'Ẩn bài quiz' và icon
                    } else {
                        quizList.style.display = 'none';
                        this.innerHTML = '<i class="fas fa-chevron-down"></i> Xem bài quiz'; // Thay đổi nút thành 'Xem bài quiz' và icon
                    }
                }
            });
        });
    });
    // bài làm --
    
</script>

<script>
    document.querySelectorAll('.edit-lesson-btn').forEach(button => {
    button.addEventListener('click', function () {
        const lessonId = this.dataset.lessonId;
        const editForm = document.querySelector(`.edit-lesson-form[data-lesson-id="${lessonId}"]`);
        if (editForm.style.display === 'none') {
            editForm.style.display = 'block';
            this.innerHTML = '<i class="fas fa-eye-slash"></i> Ẩn'; // Thay đổi icon và văn bản
        } else {
            editForm.style.display = 'none';
            this.innerHTML = '<i class="fas fa-pencil-alt"></i> Sửa'; // Thay đổi icon và văn bản
        }
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sortLessonsBtn = document.getElementById('sort-lessons-btn-{{ $chapter->id }}');
        const saveOrderBtn = document.getElementById('save-order-btn');
        const cancelSortBtn = document.getElementById('cancel-sort-btn');
        const sortableList = document.querySelector('.sortable-list');
        const lessonOrderForm = document.getElementById('lesson-order-form');
        const sortMessage = document.createElement('p'); // Dòng chữ hướng dẫn

        sortMessage.textContent = 'Kéo thả để sắp xếp';
        sortMessage.style.color = 'gray';
        sortMessage.style.fontStyle = 'italic';
        sortMessage.style.marginTop = '10px';
        sortMessage.style.display = 'none'; // Ẩn dòng chữ khi chưa kích hoạt sắp xếp

        if (sortableList) {
            sortableList.parentElement.appendChild(sortMessage); // Thêm dòng chữ hướng dẫn vào container

            const sortable = Sortable.create(sortableList, {
                handle: '.list-group-item',
                animation: 150,
                disabled: true, // Kéo thả bị vô hiệu hóa mặc định
                onEnd: function (evt) {
                    console.log('Item moved:', evt);
                }
            });

            sortLessonsBtn.addEventListener('click', function () {
                sortable.option('disabled', false);
                sortLessonsBtn.style.display = 'none';
                saveOrderBtn.style.display = 'inline-block';
                cancelSortBtn.style.display = 'inline-block';
                lessonOrderForm.style.display = 'block';
                sortMessage.style.display = 'block'; // Hiển thị dòng chữ hướng dẫn
            });

            saveOrderBtn.addEventListener('click', function () {
                sortable.option('disabled', true);
                sortLessonsBtn.style.display = 'inline-block';
                saveOrderBtn.style.display = 'none';
                cancelSortBtn.style.display = 'none';
                lessonOrderForm.style.display = 'block';
                sortMessage.style.display = 'none'; // Ẩn dòng chữ khi không cần sắp xếp

                // Cập nhật thứ tự bài học trong form
                const sortedIds = Array.from(sortableList.children).map((li, index) => {
                    return {
                        id: li.getAttribute('data-id'),
                        number: index + 1
                    };
                });

                // Gắn dữ liệu vào input hidden và submit form
                const lessonDataInput = document.createElement('input');
                lessonDataInput.type = 'hidden';
                lessonDataInput.name = 'lesson_data';
                lessonDataInput.value = JSON.stringify(sortedIds);
                lessonOrderForm.appendChild(lessonDataInput);

                lessonOrderForm.submit();
            });

            cancelSortBtn.addEventListener('click', function () {
                sortable.option('disabled', true);
                sortLessonsBtn.style.display = 'inline-block';
                saveOrderBtn.style.display = 'none';
                cancelSortBtn.style.display = 'none';
                lessonOrderForm.style.display = 'block';
                sortMessage.style.display = 'none'; // Ẩn dòng chữ khi không cần sắp xếp
            });
        }
    });
</script>
</php>