/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import model.dao.HomeJumbotronDAO;
import model.domain.HomeJumbotronModel;

/**
 *
 * @author lgpc1
 */
public class HomeJumbotron {
    
    public static HomeJumbotronModel loadJumbotron(){
        /*
        * Instanciar Classes Model
        */
        HomeJumbotronModel jumbotron;
        
        jumbotron = HomeJumbotronDAO.getJumbotronData();
        
        return jumbotron;
    }
    
    public static Boolean saveJumbotron(HomeJumbotronModel jumbotron){
        Boolean result = HomeJumbotronDAO.setJumbotron(jumbotron);
        
        return result; 
    }
}
