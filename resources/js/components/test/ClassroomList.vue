<template>
    <div>
        <div v-for="(user, index) in users" :key="index">
            {{ user.name }}
        </div>
        <br><br><br><br><br>
<pre style="font-size: 20px; font-family: 'Poppins', sans-serif;">
To be, or not to be, that is the question:
Whether 'tis nobler in the mind to suffer
The slings and arrows of outrageous fortune,
Or to take arms against a sea of troubles
And by opposing end them. To die—to sleep,
No more; and by a sleep to say we end
The heart-ache and the thousand natural shocks
That flesh is heir to: 'tis a consummation
Devoutly to be wish'd. To die, to sleep;
To sleep, perchance to dream—ay, there's the rub:
For in that sleep of death what dreams may come,
When we have shuffled off this mortal coil,
Must give us pause—there's the respect
That makes calamity of so long life.
For who would bear the whips and scorns of time,
Th'oppressor's wrong, the proud man's contumely,
The pangs of dispriz'd love, the law's delay,
The insolence of office, and the spurns
That patient merit of th'unworthy takes,
When he himself might his quietus make
With a bare bodkin? Who would fardels bear,
To grunt and sweat under a weary life,
But that the dread of something after death,
The undiscovere'd country, from whose bourn
No traveller returns, puzzles the will,
And makes us rather bear those ills we have
Than fly to others that we know not of?
Thus conscience doth make cowards of us all,
And thus the native hue of resolution
Is sicklied oer with the pale cast of thought,
And enterprises of great pith and moment
With this regard their currents turn awry
And lose the name of action.
</pre>
<br><br><br><br><br>
        <table class="table table-light">
                    <tr>
                        <th>Imie Nazwisko</th>
                        <th>Email</th>
                        <th>Klasa</th>
                        <th>Zarzadzanie</th>
                    </tr>
                    <tr v-for="(user, index) in users" :key="index">
                        <td>123</td>
                    </tr>
                    <!-- <tr>
                        <td>
                            <p class="m-0 p-0 small">{{ $student->name }}</p>
                        </td>
                        <td>
                            <p class="m-0 p-0 small">{{ $student->email }}</p>
                        </td>
                        <td>
                            <p class="m-0 p-0 small">{{ $student->classroom->name }}</p>
                        </td>
                        <td>
                            <div class="d-flex">
                                <div class="d-table me-1">
                                    <a href="{{ route('classroom.edit', $student->id) }}">
                                        <svg class="d-table-cell align-middle" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" style="height: 20px;" viewBox="0 0 256 256" xml:space="preserve">

                                            <defs>
                                            </defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                <path d="M 54.572 90 H 9.758 C 4.377 90 0 85.623 0 80.242 V 9.758 C 0 4.377 4.377 0 9.758 0 h 70.484 C 85.623 0 90 4.377 90 9.758 v 46.829 c 0 1.657 -1.343 3 -3 3 s -3 -1.343 -3 -3 V 9.758 C 84 7.686 82.314 6 80.242 6 H 9.758 C 7.686 6 6 7.686 6 9.758 v 70.484 C 6 82.314 7.686 84 9.758 84 h 44.814 c 1.657 0 3 1.343 3 3 S 56.229 90 54.572 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 71.459 25.091 H 18.541 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 52.918 c 1.657 0 3 1.343 3 3 S 73.116 25.091 71.459 25.091 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 71.459 40.364 H 18.541 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 52.918 c 1.657 0 3 1.343 3 3 S 73.116 40.364 71.459 40.364 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 33.277 55.637 H 18.541 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 14.736 c 1.657 0 3 1.343 3 3 S 34.934 55.637 33.277 55.637 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 42.823 70.909 H 18.541 c -1.657 0 -3 -1.343 -3 -3 s 1.343 -3 3 -3 h 24.282 c 1.657 0 3 1.343 3 3 S 44.479 70.909 42.823 70.909 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 87.748 72.927 L 68.666 53.845 c -1.408 -1.408 -3.158 -2.46 -5.063 -3.042 l -10.006 -3.057 c -1.662 -0.513 -3.457 -0.062 -4.685 1.167 c -1.229 1.229 -1.676 3.023 -1.168 4.684 l 3.058 10.007 c 0.582 1.904 1.634 3.654 3.042 5.063 l 19.082 19.082 C 74.427 89.25 76.4 90 78.372 90 c 1.973 0 3.945 -0.75 5.446 -2.252 l 3.93 -3.93 C 90.751 80.815 90.751 75.93 87.748 72.927 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-table me-1">
                                    <a href="{{ route('classroom.show', $student->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

                                            <defs>
                                            </defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                <path d="M 45 90 C 20.187 90 0 69.813 0 45 S 20.187 0 45 0 s 45 20.187 45 45 S 69.813 90 45 90 z M 45 7.347 C 24.238 7.347 7.347 24.238 7.347 45 S 24.238 82.653 45 82.653 S 82.653 65.762 82.653 45 S 65.762 7.347 45 7.347 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 12.374 15.851 l 0.797 -3.03 l 0.578 -2.104 c 0.482 -2.232 -4.512 -0.336 -5.243 0.234 l 0.059 0.67 c 0.666 -0.468 3.186 -1.068 2.683 0.59 l -0.225 0.846 l 0 0 l -1.149 4.287 c -0.482 2.232 4.512 0.337 5.243 -0.234 l -0.059 -0.67 C 14.392 16.909 11.872 17.509 12.374 15.851 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(3.89 0 0 3.89 -1.9444444444444287 -1.9444444444444287) " stroke-linecap="round" />
                                                <circle cx="13.295" cy="7.275" r="1.545" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform="  matrix(3.89 0 0 3.89 -1.9444444444444287 -1.9444444444444287) "/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-table me-1">
                                    <a href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

                                            <defs>
                                            </defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                <path d="M 80.89 78.772 H 9.11 c -5.023 0 -9.11 -4.087 -9.11 -9.11 V 20.338 c 0 -5.023 4.087 -9.11 9.11 -9.11 h 71.78 c 5.023 0 9.11 4.087 9.11 9.11 v 49.324 C 90 74.686 85.913 78.772 80.89 78.772 z M 9.11 17.228 c -1.715 0 -3.11 1.396 -3.11 3.11 v 49.324 c 0 1.715 1.395 3.11 3.11 3.11 h 71.78 c 1.715 0 3.11 -1.396 3.11 -3.11 V 20.338 c 0 -1.715 -1.396 -3.11 -3.11 -3.11 H 9.11 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <path d="M 45 55.427 c -5.408 0 -10.599 -2.292 -14.242 -6.288 L 2.493 18.125 l 4.435 -4.042 l 28.265 31.013 c 2.545 2.792 6.028 4.331 9.807 4.331 c 3.779 0 7.262 -1.538 9.808 -4.331 l 28.266 -31.013 l 4.434 4.042 L 59.241 49.138 C 55.599 53.135 50.408 55.427 45 55.427 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                                <rect x="-0.96" y="57.16" rx="0" ry="0" width="38.98" height="6" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(0.7053 -0.7089 0.7089 0.7053 -37.1881 30.8639) "/>
                                                <rect x="68.47" y="40.67" rx="0" ry="0" width="6" height="38.98" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(0.709 -0.7053 0.7053 0.709 -21.628 67.9146) "/>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                                <div class="d-table me-1">
                                    <a href="{{ route('warning.create', [$student->id]) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="20" height="20" viewBox="0 0 256 256" xml:space="preserve">

                                            <defs>
                                            </defs>
                                            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                                                <path d="M 89.578 78.76 l -42 -70.588 C 47.037 7.263 46.058 6.706 45 6.706 s -2.037 0.557 -2.578 1.466 l -42 70.588 c -0.552 0.928 -0.563 2.079 -0.03 3.017 C 0.925 82.715 1.921 83.294 3 83.294 h 84 c 1.079 0 2.074 -0.579 2.607 -1.518 C 90.142 80.839 90.13 79.688 89.578 78.76 z M 47.416 73.272 c -0.16 0.16 -0.331 0.308 -0.524 0.422 c -0.182 0.126 -0.376 0.239 -0.582 0.319 c -0.205 0.091 -0.421 0.148 -0.638 0.194 c -0.228 0.046 -0.445 0.068 -0.672 0.068 c -0.9 0 -1.778 -0.364 -2.416 -1.003 c -0.638 -0.638 -1.003 -1.516 -1.003 -2.416 c 0 -0.228 0.023 -0.444 0.068 -0.672 c 0.045 -0.216 0.102 -0.433 0.194 -0.638 c 0.08 -0.206 0.194 -0.4 0.319 -0.593 c 0.114 -0.183 0.262 -0.353 0.422 -0.513 c 0.16 -0.159 0.331 -0.296 0.512 -0.421 c 0.194 -0.126 0.388 -0.24 0.593 -0.319 c 0.205 -0.08 0.422 -0.148 0.638 -0.194 c 1.117 -0.228 2.291 0.137 3.089 0.934 c 0.638 0.639 1.003 1.516 1.003 2.416 S 48.054 72.634 47.416 73.272 z M 48.419 60.247 c 0 1.888 -1.53 3.419 -3.419 3.419 c -1.888 0 -3.419 -1.53 -3.419 -3.419 V 32.693 c 0 -1.888 1.531 -3.419 3.419 -3.419 c 1.888 0 3.419 1.531 3.419 3.419 V 60.247 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr> -->
                </table>
        <div v-if="loading">
            Loading..
        </div>
    </div>
</template>
<script setup>
    import axios from 'axios';
    import { ref, onMounted } from 'vue';

    const users = ref([]);
    const loading = ref(true);

    onMounted(async () => {
        try {
            const response = await axios.get('http://127.0.0.1:8000/api/classroomUsers/1');
            users.value = response.data.data;
        } catch (error) {
            console.error('Error fetching users data:', error);
        } finally {
            loading.value = false;
        }
    });

</script>
