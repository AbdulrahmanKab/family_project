let app = new Vue({
    el: '#app',
    data: {
        username:null,
        email:null,
        name:null,
        password:null,
        age:null,
        bio:null,
        image:null,
        errors:null,
        users:null,
        new_user:null,
        id:null,

    },
    methods:{
        save(){

            axios.post('/save',{
                username:this.username,
                email:this.email,
                name:this.name,
                password:this.password,
                age:this.age,
                bio:this.bio,
                image:this.image
            })
                .then(function (response){
                    console.log(response)
                    app.getData()
                })
                .catch(function (error){


                })
        },
        uploadImage(){

            let data = new FormData();
            data.append('file', document.getElementById('file').files[0]);

            axios.post('/Upload/File',data).then(function (response) {
                app.image = response.data.name;
            });
        },
        getData(){
            axios.get('/getusers')
                .then(function (response){
                    app.users = response.data.data
            }).catch(function (){})
        },
        setnew(user){
            this.id = user
        },
        update_username(){
            axios.put('/user/update/'+this.id,{
            username:this.new_user
            }).then(function (resonse){
                app.getData()
            }).catch(function (errors){})
        }
        },


    created() {
        this.getData()
    }

})
