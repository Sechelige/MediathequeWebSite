const arrowl = document.getElementById("arrowl");
const arrowr = document.getElementById("arrowr");
arrowl.addEventListener("click", function() {
    if (arrowr.classList.contains("none")) {
        arrowr.classList.remove("none")
    }
    all_slide = document.querySelectorAll(".slide");
    let buffer;
    all_slide.forEach(element => {
        if (element.classList.contains("slided") && buffer !=  null) {
            element.classList.remove("slided");
            element.classList.add("right_slide");
            buffer.classList.add("slided");
            buffer.classList.remove("left_slide");
            buffer.classList.remove("right_slide");
            buffer = null;
        }
        buffer = element;
    });

    first = document.getElementById("0");
    if (first.classList.contains("slided")) {
        arrowl.classList.add("none");
    }
})

arrowr.addEventListener("click", function() {
    if (arrowl.classList.contains("none")) {
        arrowl.classList.remove("none")
    }
    all_slide = document.querySelectorAll(".slide");
    let buffer;
    all_slide.forEach(element => {
        if (buffer == 1) {
            element.classList.add("slided")
            element.classList.remove("left_slide");
            element.classList.remove("right_slide");
            buffer = null;
        }
        if (element.classList.contains("slided") && buffer === undefined) {
            element.classList.remove("slided");
            element.classList.add("left_slide");
            buffer = 1;
        }
    });
    
    last = document.getElementById(`${all_slide.length-1}`);
    if (last.classList.contains("slided")) {
        arrowr.classList.add("none");
    }
})
