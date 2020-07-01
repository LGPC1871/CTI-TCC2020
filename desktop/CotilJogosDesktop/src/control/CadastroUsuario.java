/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import java.util.ArrayList;
import model.dao.UsuarioDAO;
import model.domain.UsuarioModel;
import okhttp3.Response;

/**
 *
 * @author lgpc1
 */
public class CadastroUsuario {
    /**
     *
     * @param where
     * @return
     */
    public static ArrayList<UsuarioModel> getUsers(String where){
        ArrayList<UsuarioModel> resultado = UsuarioDAO.getUsers(where);
        
        if(resultado != null){
            return resultado;
        }
        return null;
    }
    public static String cadastrarUsuario(UsuarioModel usuario){
        return UsuarioDAO.userRegister(usuario);
    }
    public static Boolean removerUsuario(UsuarioModel usuario){
        return UsuarioDAO.deleteUser(usuario.getRa());
    }
}
