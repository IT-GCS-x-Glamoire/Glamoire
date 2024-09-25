(function ($) {
    "use strict";

    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $(".navbar .dropdown")
                    .on("mouseover", function () {
                        $(".dropdown-toggle", this).trigger("click");
                    })
                    .on("mouseout", function () {
                        $(".dropdown-toggle", this).trigger("click").blur();
                    });
            } else {
                $(".navbar .dropdown").off("mouseover").off("mouseout");
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });
    $(".back-to-top").click(function () {
        $("html, body").animate({ scrollTop: 0 }, 1500, "easeInOutExpo");
        return false;
    });

    // Product Quantity
    $(".quantity button").on("click", function () {
        var button = $(this);
        var oldValue = button.parent().parent().find("input").val();
        if (button.hasClass("btn-plus")) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        button.parent().parent().find("input").val(newVal);
    });

    // API WILAYAH FOR REGISTER
    fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
        .then((response) => response.json())
        .then((provinces) => {
            const provinceSelect = document.getElementById("province");

            provinces.forEach((province) => {
                let option = document.createElement("option");
                option.value = province.id;
                option.text = province.name;
                provinceSelect.appendChild(option);
            });
        })
        .catch((error) => console.error("Error fetching provinces:", error));

    // Event listener for province selection
    // PILIH PROVINSI
    document.getElementById("province").addEventListener("change", function () {
        const provinceId = this.value;
        const provinceName = this.options[this.selectedIndex].text; // Get the name
        document.getElementById("province_name").value = provinceName; // Save name in hidden input

        const regencySelect = document.getElementById("regency");
        regencySelect.innerHTML =
            '<option value="">Pilih Kabupaten/Kota</option>';
        document.getElementById("regency_name").value = ""; // Clear previous regency name

        // GET DATA REGENCIES FROM PROVINCE
        if (provinceId) {
            fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`
            )
                .then((response) => response.json())
                .then((regencies) => {
                    regencies.forEach((regency) => {
                        let option = document.createElement("option");
                        option.value = regency.id;
                        option.text = regency.name;
                        regencySelect.appendChild(option);
                    });
                })
                .catch((error) =>
                    console.error("Error fetching regencies:", error)
                );
        }
    });

    document.getElementById("regency").addEventListener("change", function () {
        const regenciesId = this.value;
        const regenciesName = this.options[this.selectedIndex].text; // Get the name
        document.getElementById("regency_name").value = regenciesName; // Save name in hidden input

        const districtSelect = document.getElementById("district");
        districtSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
        document.getElementById("district_name").value = ""; // Clear previous regency name

        // GET DATA DISTRICT FROM REGENCY
        if (regenciesId) {
            fetch(
                `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regenciesId}.json`
            )
                .then((response) => response.json())
                .then((districts) => {
                    districts.forEach((district) => {
                        let option = document.createElement("option");
                        option.value = district.id;
                        option.text = district.name;
                        districtSelect.appendChild(option);
                    });
                })
                .catch((error) =>
                    console.error("Error fetching districts:", error)
                );
        }
    });

    // Event listener for regency selection
    document.getElementById("regency").addEventListener("change", function () {
        const regencyName = this.options[this.selectedIndex].text; // Get the name
        document.getElementById("regency_name").value = regencyName; // Save name in hidden input
    });

    // Event listener for district selection
    document.getElementById("district").addEventListener("change", function () {
        const districtName = this.options[this.selectedIndex].text; // Get the name
        document.getElementById("district_name").value = districtName; // Save name in hidden input
    });
    // END API WILAYAH REGISTER

    // API WILAYAH FOR ADDRESS
    fetch("https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json")
        .then((response) => response.json())
        .then((provinces) => {
            const provinceSelect = document.getElementById("address_province");

            provinces.forEach((province) => {
                let option = document.createElement("option");
                option.value = province.id;
                option.text = province.name;
                provinceSelect.appendChild(option);
            });
        })
        .catch((error) => console.error("Error fetching provinces:", error));

    // Event listener for province selection
    // PILIH PROVINSI
    document
        .getElementById("address_province")
        .addEventListener("change", function () {
            const provinceId = this.value;
            const provinceName = this.options[this.selectedIndex].text; // Get the name
            document.getElementById("address_province_name").value =
                provinceName; // Save name in hidden input

            const regencySelect = document.getElementById("address_regency");
            regencySelect.innerHTML =
                '<option value="">Pilih Kabupaten/Kota</option>';
            document.getElementById("address_regency_name").value = ""; // Clear previous regency name

            // GET DATA REGENCIES FROM PROVINCE
            if (provinceId) {
                fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinceId}.json`
                )
                    .then((response) => response.json())
                    .then((regencies) => {
                        regencies.forEach((regency) => {
                            let option = document.createElement("option");
                            option.value = regency.id;
                            option.text = regency.name;
                            regencySelect.appendChild(option);
                        });
                    })
                    .catch((error) =>
                        console.error("Error fetching regencies:", error)
                    );
            }
        });

    document
        .getElementById("address_regency")
        .addEventListener("change", function () {
            const regenciesId = this.value;
            const regenciesName = this.options[this.selectedIndex].text; // Get the name
            document.getElementById("address_regency_name").value =
                regenciesName; // Save name in hidden input

            const districtSelect = document.getElementById("address_district");
            districtSelect.innerHTML =
                '<option value="">Pilih Kecamatan</option>';
            document.getElementById("address_district_name").value = ""; // Clear previous regency name

            // GET DATA DISTRICT FROM REGENCY
            if (regenciesId) {
                fetch(
                    `https://www.emsifa.com/api-wilayah-indonesia/api/districts/${regenciesId}.json`
                )
                    .then((response) => response.json())
                    .then((districts) => {
                        districts.forEach((district) => {
                            let option = document.createElement("option");
                            option.value = district.id;
                            option.text = district.name;
                            districtSelect.appendChild(option);
                        });
                    })
                    .catch((error) =>
                        console.error("Error fetching districts:", error)
                    );
            }
        });

    // Event listener for regency selection
    document
        .getElementById("address_regency")
        .addEventListener("change", function () {
            const regencyName = this.options[this.selectedIndex].text; // Get the name
            document.getElementById("address_regency_name").value = regencyName; // Save name in hidden input
        });

    // Event listener for district selection
    document
        .getElementById("address_district")
        .addEventListener("change", function () {
            const districtName = this.options[this.selectedIndex].text; // Get the name
            document.getElementById("address_district_name").value =
                districtName; // Save name in hidden input
        });
    // END API WILAYAH REGISTER
})(jQuery);
