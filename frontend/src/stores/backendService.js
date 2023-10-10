import {defineStore} from 'pinia';
import Axios from 'axios';

export const useBackendStore = defineStore('backend', {
    state: () => ({ 
        backendData: []
     }),
    getters: {},
    actions: {
        getXData(){
            Axios.get(``)
            .then( resp=>{
                this.backendData=resp.data;
                console.log(this.backendData);
            })
        }
    }
});