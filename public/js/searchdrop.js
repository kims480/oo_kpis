
// const even t = new Event('build');

// Listen for the event.
// elem.addEventListener('build', function (e) { /* ... */ }, false);

"use strict";
class SearchDrop {

    constructor(domID = "") {
        this.domID = domID;
        this.selected = document.querySelector(this.domID + " .selected");
        this.optionsContainer = document.querySelector(this.domID + " .options-container");
        this.searchBox = document.querySelector(this.domID + " .search-box input");
        this.optionsList = document.querySelectorAll(this.domID + " .option");
        this.getEventListener();

    }


    getEventListener() {
        this.selected.addEventListener("click", () => {
            this.optionsContainer.classList.toggle("active");

            this.searchBox.value = "";
            this.filterList("");

            if (this.optionsContainer.classList.contains("active")) {
                this.searchBox.focus();
            }
        });
          this.searchBox.addEventListener("keyup", e=> {
            this.filterList(e.target.value);
          });
        if (this.optionsContainer.classList.contains("active")) {
            this.searchBox.focus();
        }
        this.optionsList.forEach(o => {
            o.addEventListener("click", () => {
                this.selected.innerHTML = o.querySelector("label").innerHTML;
                this.searchBox.classList.add("opacity-0");
                this.optionsContainer.classList.add("hidden");
                this.optionsContainer.classList.remove("active");

                o.querySelector("input").setAttribute('checked',true)
            });
        });
    }
    filterList(searchTerm) {
        searchTerm = searchTerm.toLowerCase();
        this.optionsList.forEach(option => {
            let label = option.firstElementChild.nextElementSibling.innerText.toLowerCase();
            if (label.indexOf(searchTerm) != -1) {
                option.style.display = "block";
            } else {
                option.style.display = "none";
            }
        });
        // Dispatch the event.
        // elem.dispatchEvent(event);
    }


}

