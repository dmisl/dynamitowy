<template>
    <div>
        <div class="d-inline-block bg-warning rounded-3" style="position: fixed; bottom: 20px; right: 20px;">
            <div class="p-2">
                <h4 class="fw-medium">Wybierz ucznia</h4>
                <table class="table table-primary bordered border-dark">
                    <tbody>
                        <tr>
                            <td class="p-1 text-center border-end border-dark fs-5">Nazwa</td>
                            <td class="p-1 text-center fs-5">Symbol</td>
                        </tr>
                        <tr >
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Obecny</p>
                            </td>
                            <td @click="changePresenceStatus(0)" class="p-1 text-center"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10"
                                    viewBox="0 0 256 256" xml:space="preserve">
                                    <defs></defs>
                                    <g transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)"
                                        style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;">
                                        <path
                                            d="M 45 0 C 20.147 0 0 20.147 0 45 c 0 24.853 20.147 45 45 45 s 45 -20.147 45 -45 C 90 20.147 69.853 0 45 0 z M 52.87 52.189 C 50.779 54.063 48.156 55 45 55 c -3.196 0 -5.829 -0.947 -7.9 -2.839 c -2.071 -1.894 -3.107 -4.281 -3.107 -7.161 c 0 -2.878 1.036 -5.266 3.107 -7.161 C 39.171 35.947 41.804 35 45 35 c 3.156 0 5.779 0.937 7.87 2.811 c 2.09 1.874 3.136 4.27 3.136 7.189 C 56.007 47.921 54.961 50.317 52.87 52.189 z"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0, 0, 0); fill-rule: nonzero; opacity: 1;">
                                        </path>
                                    </g>
                                </svg></td>
                        </tr>
                        <tr>
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Nieobecnosc</p>
                            </td>
                                <td  @click="changePresenceStatus(1)" class="p-1 text-center"><svg xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10"
                                        viewBox="0 0 256 256" xml:space="preserve">
                                        <defs></defs>
                                        <g transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)"
                                            style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;">
                                            <path
                                                d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29, 29, 27); fill-rule: nonzero; opacity: 1;">
                                            </path>
                                            <path
                                                d="M 86.5 48.5 h -83 C 1.567 48.5 0 46.933 0 45 s 1.567 -3.5 3.5 -3.5 h 83 c 1.933 0 3.5 1.567 3.5 3.5 S 88.433 48.5 86.5 48.5 z"
                                                transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"
                                                style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(29, 29, 27); fill-rule: nonzero; opacity: 1;">
                                            </path>
                                        </g>
                                    </svg></td>
                        </tr>
                        <tr >
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Nieobecnosc uspraw.</p>
                            </td>
                            <td @click="changePresenceStatus(2)" class="p-1 text-center">
                                <p class="p-0 m-0">u</p>
                            </td>
                        </tr>
                        <tr >
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Zwolnienie</p>
                            </td>
                            <td @click="changePresenceStatus(3)" class="p-1 text-center">
                                <p class="p-0 m-0">z</p>
                            </td>
                        </tr>
                        <tr >
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Spoz. z pow. przy.</p>
                            </td>
                            <td @click="changePresenceStatus(4)" class="p-1 text-center">
                                <p class="p-0 m-0">s</p>
                            </td>
                        </tr>
                        <tr >
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Spoz. z niepow. przy.</p>
                            </td>
                            <td @click="changePresenceStatus(5)" class="p-1 text-center">
                                <p class="p-0 m-0">ns</p>
                            </td>
                        </tr>
                        <tr>
                            <td class="p-1 border-end border-dark">
                                <p class="p-0 m-0">Niewiadomo</p>
                            </td>
                            <td class="p-1 text-center" @click="changePresenceStatus(6)"><svg xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="10" height="10"
                                    viewBox="0 0 256 256" xml:space="preserve">
                                    <defs></defs>
                                    <g transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)"
                                        style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;">
                                        <path
                                            d="M 63.835 7.659 c -5.257 -5.122 -12.197 -7.834 -19.547 -7.649 C 29.799 0.382 18.012 12.748 18.012 27.574 v 3.955 c 0 0.552 0.448 1 1 1 h 12.334 c 0.552 0 1 -0.448 1 -1 v -4.112 c 0 -6.913 5.419 -12.776 12.081 -13.07 c 3.492 -0.149 6.803 1.088 9.321 3.498 c 2.52 2.411 3.907 5.658 3.907 9.144 v 0.691 c 0 6.893 -5.54 12.517 -12.402 12.652 c -0.081 -0.021 -0.165 -0.032 -0.252 -0.032 c -7.353 0 -13.334 5.982 -13.334 13.334 v 15.237 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 58.096 c 0 -1.86 1.337 -3.468 3.109 -3.739 c 13.043 -1.993 22.879 -13.461 22.879 -26.677 v -0.691 C 71.988 19.647 69.093 12.783 63.835 7.659 z"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0, 0, 0); fill-rule: nonzero; opacity: 1;">
                                        </path>
                                        <path
                                            d="M 45 75.666 H 32.666 c -0.552 0 -1 0.447 -1 1 V 89 c 0 0.553 0.448 1 1 1 H 45 c 0.552 0 1 -0.447 1 -1 V 76.666 C 46 76.113 45.552 75.666 45 75.666 z"
                                            transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"
                                            style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0, 0, 0); fill-rule: nonzero; opacity: 1;">
                                        </path>
                                    </g>
                                </svg></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "PresenceTableChange",
    methods: {
        changePresenceStatus(id) {
            // console.log(e);
            this.emitter.emit("ChangeTablePresence", { data: id });
        }
    },
}
</script>