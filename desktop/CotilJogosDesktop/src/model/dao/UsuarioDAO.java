/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

/**
 *
 * @author 55199
 */

import connection.ConnectionFactory;
import control.Usuario;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import model.domain.UsuarioModel;
import model.dao.ExceptionDAO;
import model.domain.UsuarioModel;

public class UsuarioDAO {
    
    private Connection con = null;
    
    public UsuarioDAO(){
        con = ConnectionFactory.getConnection();
    }
        
    static public boolean save(UsuarioModel usuario){
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        

        try {
            stmt = con.prepareStatement("INSERT INTO usuario (ra,email,nome,sobrenome) VALUES (?,?,?,?)");
            stmt.setString(1,usuario.getRa());
            stmt.setString(2,usuario.getEmail());
            stmt.setString(3,usuario.getNome());
            stmt.setString(4,usuario.getSobrenome());
            stmt.executeUpdate();
            return true;
        } catch (SQLException ex) {
            Logger.getLogger(UsuarioDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        return false;
    }
}
