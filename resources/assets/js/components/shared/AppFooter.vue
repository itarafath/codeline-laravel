<template>
    <footer>
        <hr>
        <div class="container"></div>
    </footer>
</template>

<script>
    import {siteName} from '../../config';

    export default {
        data() {
            return {
                siteName: siteName,
                currentYear: (new Date).getFullYear()
            }
        }
    }
</script>
