<template>
    <div class='row'>
        <div class='col-6'>
            <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class='col-6'>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Gred</th>
                        <th>Markah</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="matapelajaran in matapelajarans" v-bind:key="matapelajaran.id">
                        <th>{{matapelajaran.nama}}</th>
                        <th>{{matapelajaran.gred}}</th>
                        <th>{{matapelajaran.markah}}</th>
                        <th><button @click="deleteMatapelajaran(matapelajaran.id)" class="btn btn-danger">Delete</button></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                matapelajarans: [],
                matapelajaran:{
                    id: "",
                    nama: "",
                    gred: "",
                    markah: ""
                }
            };
        },
        created(){
            this.fetchdatamatapelajaran();
        },
        methods:{
            fetchdatamatapelajaran(){
                fetch('/datamatapelajaran')
                .then(res=>res.json())
                .then(res=>{
                    this.matapelajarans = res.matapelajarans;
                })
                .catch(err=>console.log(err));
            },
            deleteMatapelajaran(matapelajaran){
                this.matapelajaran.id= matapelajaran
                console.log("Id nak delete: " + this.matapelajaran.id);

                fetch('/deleteMatapelajaran',{
                    method: 'POST',
                    body: JSON.stringify(this.matapelajaran),
                    headers:{
                        'content-type':'application/json',
                        'X-CSRF-Token': $("meta[name=csrf-token]").attr("content"),
                        Accept: "application/json"

                    }
                })
                    .then(res=>res.json())
                    .then(res=>{
                        this.fetchdatamatapelajaran();
                    })
                    .catch(err=>console.log(err));
            }
        }
    }
</script>
