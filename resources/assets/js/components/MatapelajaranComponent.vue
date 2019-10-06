<template>
    <div class='row'>
        <div class='col-6'>
            <form @submit.prevent="insertMatapelajaran">
            <div class="form-group">
                <label for="exampleInputEmail1">Matapelajaran</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="matapelajaran.nama" placeholder="Enter matapelajaran">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Gred</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="matapelajaran.gred" placeholder="Enter gred">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Markah</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" v-model="matapelajaran.markah" placeholder="Enter markah">
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
                        <th><button @click="deleteMatapelajaran(matapelajaran.id)" class="btn btn-danger">Delete</button><br>
                        <button @click="updateMatapelajaran(matapelajaran)" class="btn btn-warning">Edit</button></th>
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
                },
                edit: false
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
            },
            insertMatapelajaran(){
                if(this.edit === false){
                    fetch('/insertMatapelajaran',{
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
                        this.matapelajaran.nama= '';
                        this.matapelajaran.gred= '';
                        this.matapelajaran.markah= '';
                        this.edit= true;
                        this.fetchdatamatapelajaran();
                    })
                    .catch(err=>console.log(err));
                }else{
                    fetch('/updateMatapelajaran',{
                    method: 'PUT',
                    body: JSON.stringify(this.matapelajaran),
                    headers:{
                        'content-type':'application/json',
                        'X-CSRF-Token': $("meta[name=csrf-token]").attr("content"),
                        Accept: "application/json"

                    }
                })
                    .then(res=>res.json())
                    .then(res=>{
                        console.log('dh masok update');
                        this.matapelajaran.nama= '';
                        this.matapelajaran.gred= '';
                        this.matapelajaran.markah= '';
                        this.fetchdatamatapelajaran();
                    })
                    .catch(err=>console.log(err));
                }
                
            
                },
                updateMatapelajaran(matapelajaran){
                    console.log('masok update');
                    this.matapelajaran.id= matapelajaran.id;
                    this.matapelajaran.nama= matapelajaran.nama;
                    this.matapelajaran.gred= matapelajaran.gred;
                    this.matapelajaran.markah= matapelajaran.markah;
                }
                            
        }
    }
</script>
