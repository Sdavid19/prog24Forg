import {defineStore} from 'pinia';
import Axios from 'axios';

export const useFoodSaverStore = defineStore('foodSaver', {
    state: () => ({ 
        foodSaverData: []
     }),
    getters: {},
    actions: {
        getWeatherData(){
            Axios.get(`/foodsavers`)
            .then( resp=>{
                this.backendData=resp.data;
                console.log(this.backendData);
            })
        }
    }
});