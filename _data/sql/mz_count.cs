using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Newanketa
{
    #region Mz_count
    public class Mz_count
    {
        #region Member Variables
        protected unknown _id;
        protected unknown _form_id;
        protected unknown _medicalorganization_id;
        protected unknown _mzcount;
        protected unknown _created_at;
        protected unknown _modified_at;
        #endregion
        #region Constructors
        public Mz_count() { }
        public Mz_count(unknown form_id, unknown medicalorganization_id, unknown mzcount, unknown created_at, unknown modified_at)
        {
            this._form_id=form_id;
            this._medicalorganization_id=medicalorganization_id;
            this._mzcount=mzcount;
            this._created_at=created_at;
            this._modified_at=modified_at;
        }
        #endregion
        #region Public Properties
        public virtual unknown Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual unknown Form_id
        {
            get {return _form_id;}
            set {_form_id=value;}
        }
        public virtual unknown Medicalorganization_id
        {
            get {return _medicalorganization_id;}
            set {_medicalorganization_id=value;}
        }
        public virtual unknown Mzcount
        {
            get {return _mzcount;}
            set {_mzcount=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Modified_at
        {
            get {return _modified_at;}
            set {_modified_at=value;}
        }
        #endregion
    }
    #endregion
}