document.addEventListener('DOMContentLoaded', function () {
    var formSteps = document.querySelectorAll('.add-course-info');
    var currentStep = 0;

    for (var i = 1; i < formSteps.length; i++) {
        formSteps[i].style.display = 'none';
    }
    showStep(currentStep); // Hiển thị bước hiện tại

    var nextButtons = document.querySelectorAll('.next');
    var prevButtons = document.querySelectorAll('.prev');

    nextButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            hideStep(currentStep);
            currentStep++;
            if (currentStep < formSteps.length) {
                showStep(currentStep);
            }
        });
    });
    prevButtons.forEach(function (button, index) {
        button.addEventListener('click', function () {
            hideStep(currentStep);
            currentStep--;
            if (currentStep >= 0) {
                showStep(currentStep);
            }
        });
    });

    // Hiển thị bước hiện tại
    function showStep(step) {
        formSteps[step].style.display = 'block';
    }

    // Ẩn bước hiện tại
    function hideStep(step) {
        formSteps[step].style.display = 'none';
    }
});
