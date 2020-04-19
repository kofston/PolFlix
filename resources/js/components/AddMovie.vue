<template>
    <div class="container">
    <div class="add_movie_box">
        <div class="add_movie_box_inside text-center">
            <img :src="logo" style="margin-bottom: 25px;">
            <form method="POST" action="/admin/add_movie_form" enctype="multipart/form-data">
                <div class="form-group text-center">
                    <input type="text" class="form-control input_login_r" name="title_new" placeholder=" Tytuł"  v-model="videodata['title']" required>
                </div>
                <div class="form-group text-center">
                    <input type="textarea" style="min-height: 200px;" class="form-control input_login_r" v-model="videodata['description']" name="desc_new" placeholder=" Opis" required>
                </div>
                <div class="form-group text-center">
                    <input type="number" class="form-control input_login_r" name="price_new" placeholder=" Cena" v-model="videodata['price']" required>
                </div>
                <div class="form-group text-center">
                    <span class="text-white">Podaj numer kategorii: 1-Film Akcji 2-Komedie 3-Filmy przygodowe</span>
                    <input type="text" class="form-control input_login_r" name="category_new" placeholder=" Kategoria" v-model="videodata['category']" required>
                </div>
                <div class="form-group text-center">
                    <input type="text" class="form-control input_login_r" name="director_new" placeholder=" Reżyser" v-model="videodata['director']" required>
                </div>
                <div class="form-group text-center">
                    <input type="text" class="form-control input_login_r" name="pegi_new" placeholder=" Kategoria wiekowa ( wpisz wiek )" v-model="videodata['pegi']" required>
                </div>
                <div class="form-group text-center">
                    <span class="text-white">Podaj rodzaj nośnika: 1-Dvd 2-Bluray 3-Br4k 4-Dvd+Bluray 5-Bluray+Bluray4k</span>
                    <input type="text" class="form-control input_login_r" name="carier_new" placeholder=" Rodzaj nośnika" v-model="videodata['carrier']" required>
                </div>
                <div class="form-group text-center">
                    <input type="text" class="form-control input_login_r" name="amount_new" placeholder=" Ilość sztuk" v-model="videodata['amount']" required>
                </div>
                <div class="form-group text-center">
                    <input type="file" class="form-control input_login_r" name="avatar_new" id="avatar_new" accept="image/png, image/jpeg, image/jpg" placeholder=" Zdjęcie podglądowe" required>
                </div>
                <div class="form-group text-center">
                    <input type="text" class="form-control input_login_r" name="trailer_new" placeholder=" Link do trailera" v-model="videodata['trailer']" required>
                </div>
                <div class="form-group text-center">
                    <input type="hidden" v-model="movieid" class="form-control input_login_r" name="movie_id_new" >
                </div>
                <button type="submit" id="new_movie_but" name="add_video_confirm" class="text-white login-button ">Dodaj film</button>
            </form>
        </div>
    </div>
    </div>
</template>

<script>
    export default {
        name: "AddMovie",
        data(){
            return{
                logo: '/images/logo.png',
            }
        },
        props:
            {
                videodata:{
                    required:true
                },
                movieid:{
                    type:String,
                    required: true
                }
            }
    }
</script>

<style scoped>

</style>
