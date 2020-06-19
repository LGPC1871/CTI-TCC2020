/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import model.domain.AdminModel;
import views.ViewMain;

/**
 *
 * @author lgpc1
 */
public class Main {

    public Main(AdminModel userData) {
        ViewMain main = new ViewMain(userData);
        userData = null;
    }
}
