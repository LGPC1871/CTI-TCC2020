/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import model.domain.Modalidade;

/**
 *
 * @author 55199
 */
public class ModalidadeDAO {
    
    public void create(Modalidade m){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try{
            stmt = con.prepareStatement("INSERT INTO modalidade (nome,descricao) VALUES (?,?)");
            stmt.setString(1,m.getNome());
            stmt.setString(2,m.getDescricao());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "Modalidade cadastrada com sucesso!!!");
            
        } catch(SQLException ex){
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "Erro ao criar Modalidade: "+ex);
            
        }finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
    }
    
}
