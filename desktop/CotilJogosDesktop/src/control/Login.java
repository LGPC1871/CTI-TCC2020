/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package control;

import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import model.dao.AdminDAO;
import model.domain.AdminModel;
import util.CriptografarSenha;

/**
 *
 * @author lgpc1
 */
public class Login{
    
    public static AdminModel validarInformacoes(String usuario, String senha){
        
        String senhaCr = null;
        int userId = 0;
        
        /*
        * Instanciando classes admin
        */
        AdminDAO adminDAO = new AdminDAO();
        AdminModel admin;
        
        userId = adminDAO.userExist(usuario);
        if(userId != 0){
            
            admin = adminDAO.selectAdminData(userId);
            
            /*
            *verificar senha
            */
            senhaCr = CriptografarSenha.gerarSenha(senha);
            
            if(usuario.equals(admin.getUsuario()) && senhaCr.equals(admin.getSenha())){
                adminDAO = null;
                admin.setSenha(null);
                return admin;
            }
            
        }
        
        return null;
    }
    
    
}
