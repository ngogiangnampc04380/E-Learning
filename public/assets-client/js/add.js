document.addEventListener('DOMContentLoaded', function () {
    var formSteps = document.querySelectorAll('.add-course-info');
    var currentStep = 0;

    // Ẩn tất cả các bước trừ bước đầu tiên
    for (var i = 1; i < formSteps.length; i++) {
        formSteps[i].style.display = 'none';
    }

    // Lấy tất cả các nút "Tiếp theo" và "Quay lại"
    var nextButtons = document.querySelectorAll('.next');
    var prevButtons = document.querySelectorAll('.prev');

    // Lắng nghe sự kiện khi người dùng nhấn nút "Tiếp theo"
    nextButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            formSteps[currentStep].style.display = 'none';
            currentStep++;
            if (currentStep < formSteps.length) {
                formSteps[currentStep].style.display = 'block';
            }
        });
    });

    // Lắng nghe sự kiện khi người dùng nhấn nút "Quay lại"
    prevButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            formSteps[currentStep].style.display = 'none';
            currentStep--;
            if (currentStep >= 0) {
                formSteps[currentStep].style.display = 'block';
            }
        });
    });
});
