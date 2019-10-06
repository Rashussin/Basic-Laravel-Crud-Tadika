<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Example Component</div>

                    <div class="panel-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Gred</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="subjek in subjeks" v-bind:key="subjek.nama">
                                    <td>{{ subjek.nama }}</td>
                                    <td>{{ subjek.gred }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                subjeks: [
                        {nama:"sejarah", gred: "A"}
                    ]
            };
        }
    };
</script>