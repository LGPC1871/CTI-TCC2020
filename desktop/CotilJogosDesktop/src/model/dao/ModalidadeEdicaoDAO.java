/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import model.domain.Modalidade;
import model.domain.ModalidadeEdicao;

/**
 *
 * @author 55199
 */
public class ModalidadeEdicaoDAO {
        public void create(ModalidadeEdicao me){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try{
            stmt = con.prepareStatement("INSERT INTO modalidade_edicao (edicao_id,modalidade_id,status,modalidade_edicao_status_id) VALUES (?,?,?,?)");
            stmt.setInt(1,me.getEdicao());
            stmt.setInt(2,me.getModalidade());
            stmt.setInt(3,me.getAtivar());
            stmt.setInt(4,me.getStatus());

            
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "relação cadastrada com sucesso!!!");
            
        } catch(SQLException ex){
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "Erro ao criar Relação: "+ex);
            
        }finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
    }
         public void delete(ModalidadeEdicao me){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            stmt = con.prepareStatement("DELETE FROM modalidade_edicao WHERE id = ?");
            stmt.setInt(1,me.getId());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "RELAÇÃO EXCLUIDA COM SUCESSO!!!");
        } catch (SQLException ex) {
            Logger.getLogger(ModalidadeDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "ERRO AO EXCLUIR RELAÇÃO : "+ex);
        } finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
        
    }
             public java.util.List<ModalidadeEdicao> read() {
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        java.util.List<ModalidadeEdicao> ModalidadeEdicao = new ArrayList<>();
        
        try {
            stmt = con.prepareStatement("select * from modalidade_edicao");
            rs = stmt.executeQuery();
            
            while(rs.next()){
                
            ModalidadeEdicao t = new ModalidadeEdicao();
            t.setEdicao(rs.getInt("edicao_id"));
            t.setModalidade(rs.getInt("modalidade_id"));
            t.setAtivar(rs.getInt("status"));
            t.setStatus(rs.getInt("modalidade_edicao_status_id"));
            ModalidadeEdicao.add(t);

            }
            
        } catch (SQLException ex) {
            Logger.getLogger(ModalidadeEdicaoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        
        return ModalidadeEdicao;
}
}
